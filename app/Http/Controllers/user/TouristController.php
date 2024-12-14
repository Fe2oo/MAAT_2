<?php
namespace App\Http\Controllers\user;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Trip;
use App\Models\Purchase;
use App\Http\Requests\TouristRequest;
use App\Http\Requests\PurchaseRequest;

class TouristController extends Controller
{
    public function trips()
    {
        $trips = Trip::all();
        return view('user.trips', compact('trips'));
    }
    public function buy($id)
    {
        $trip = Trip::findOrFail($id);
        return view('user.buy', compact('trip'));
    }
    public function storePurchase(PurchaseRequest $request)
{
    $data = $request->validated();

    // Check if it's a trip or product purchase
    if ($request->has('trip_id')) {
        $trip = Trip::findOrFail($request->trip_id);
        $data['trip_name'] = $trip->name; // Include any other trip-related fields
    } elseif ($request->has('product_id')) {
        $product = Product::findOrFail($request->product_id);
        $data['trip_name'] = null;  // Set this to null or a default value for products
        //$data['place'] = $product->place;  // Set place based on product if needed
    }

    $data['user_name'] = auth()->user()->name;

    Purchase::create($data);  // Store the purchase data

    return redirect()->route('trips.index')->with('msg', 'Purchase completed successfully!');
}

    public function edit($id){
        $trips = Trip::findOrFail($id);
        return view('user.edit',compact('trips'));
    }
    public function index()
    {
        $purchases = Purchase::all(); // Retrieve all purchases
        return view('admin.employee.purchases', compact('purchases'));
    }

    public function create()
    {
        return view('user.create');
    }
    public function about()
    {
        return view('user.about');
    }
    public function home()
    {
        return view('user.home');
    }
    public function store(TouristRequest $request){
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $image = $request->file('image');

            $customPath = 'user/assets/img';

            $imagePath = $image->storeAs($customPath, $image->getClientOriginalName(), 'public');


                $data['image'] = $imagePath;
        }
        Trip::create($data);

        return redirect()->route('trips.index')->with('msg', 'Trip added successfully!');
    }
    public function update (TouristRequest $request , $id){
        $data = $request->validated();
        $trips = Trip::findOrFail($id);
        $trips->update($data);
        return redirect()->route('trips.index')->with('msg', 'Updated successfully!');
    }
    public function destroy($id){
        $trips=Trip::findOrFail($id);
        $trips->delete();
        return redirect()->back()->with('msg','Deleted..');
    }
}
