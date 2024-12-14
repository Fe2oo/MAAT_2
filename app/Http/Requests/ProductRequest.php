namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PurchaseRequest extends FormRequest
{
    public function rules()
    {
        return [
            'place' => 'required|string|max:255', // Ensure place is provided (or make it nullable)
            'phone' => 'required|string|max:20', // Phone number validation
            'product_id' => 'required|exists:products,id', // Validate the product_id to exist in the database
        ];
    }

    public function messages()
    {
        return [
            'place.required' => 'The place is required for product purchases.',
            'phone.required' => 'The phone number is required.',
            'product_id.exists' => 'The selected product does not exist.',
        ];
    }
}
