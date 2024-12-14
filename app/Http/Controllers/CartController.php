namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // Add product to cart
    public function addToCart($productId)
    {
        $product = Product::findOrFail($productId);

        // Check if the product is already in the cart
        $existingCart = Cart::where('user_id', auth()->id())
                            ->where('product_id', $productId)
                            ->first();

        if ($existingCart) {
            // If product is already in cart, increase quantity
            $existingCart->increment('quantity');
        } else {
            // If not, create a new cart item
            Cart::create([
                'user_id' => auth()->id(),
                'product_id' => $productId,
                'quantity' => 1
            ]);
        }

        return redirect()->route('cart.view')->with('msg', 'Product added to cart!');
    }

    // View cart
    public function viewCart()
    {
        // Get the current user's cart
        $cartItems = Cart::with('product')->where('user_id', auth()->id())->get();

        return view('user.cart', compact('cartItems'));
    }

    // Remove product from cart
    public function removeFromCart($cartId)
    {
        $cartItem = Cart::findOrFail($cartId);
        $cartItem->delete();

        return redirect()->route('cart.view')->with('msg', 'Product removed from cart!');
    }

    // Update cart (e.g., change quantity)
    public function updateCart(Request $request, $cartId)
    {
        $cartItem = Cart::findOrFail($cartId);
        $cartItem->update(['quantity' => $request->quantity]);

        return redirect()->route('cart.view')->with('msg', 'Cart updated successfully!');
    }

    // Proceed to checkout
    public function checkout()
    {
        // Get cart items and prepare for purchase
        $cartItems = Cart::with('product')->where('user_id', auth()->id())->get();

        return view('user.checkout', compact('cartItems'));
    }
}
