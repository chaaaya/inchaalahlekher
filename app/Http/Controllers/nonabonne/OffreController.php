<?php
namespace App\Http\Controllers\nonabonne;
use App\Http\Controllers\Controller;
use App\Models\Offer;
use App\Models\Vol;
use Illuminate\Http\Request;

class OffreController extends Controller
{
    public function index()
    {
        $offers = Offer::all();
        return view('client.nonabonne.offres.index', compact('offers'));
    }

    public function show($id)
{
    $offer = Offer::findOrFail($id);
    $reservations = $offer->reservations()->with('vol')->get();

    return view('client.nonabonne.offres.show', compact('offer', 'reservations'));
}


    public function calculatePrice(Request $request, $offerId)
    {
        $offer = Offer::findOrFail($offerId);
        $vol = Vol::findOrFail($request->vol_id);

        $initialPrice = $vol->price;
        $finalPrice = $initialPrice;

        if ($offer) {
            if ($offer->percentage_discount) {
                $discountAmount = ($initialPrice * $offer->percentage_discount) / 100;
                $finalPrice = $initialPrice - $discountAmount;
            } elseif ($offer->amount_discount) {
                $finalPrice = $initialPrice - $offer->amount_discount;
            }
        }

        return response()->json(['finalPrice' => $finalPrice]);
    }
}
