<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Booking;
use App\Professional;
use App\Customer;

class BookingController extends Controller
{
    public function getLatestByProfessional(Request $request)
    {
        $professional_id = $this->getMandate($request, 'professional_id');
        $lastUpdateTimestamp = $this->getMandate($request, 'last_update_timestamp');
        $professional = Professional::findOrFail($professional_id);
        return $professional->bookings()->where('updated_at', '>', $lastUpdateTimestamp)->get();
    }

    public function create(Request $request)
    {
        $booking = new Booking();
        $booking->professional_id = $this->getMandate($request, 'professional_id');
        $booking->customer_id = $this->getMandate($request, 'customer_id');
        $booking->start_time = $this->getMandate($request, 'start_time');
        $booking->service = $this->getMandate($request, 'service');
        $booking->booking_type = 'normal';
        $booking->status = 'pending';
        $booking->save();

        return $booking;
    }

    public function getLatestByCustomer(Request $request)
    {
        $customer_id = $this->getMandate($request, 'customer_id');
        $lastUpdateTimestamp = $this->getMandate($request, 'last_update_timestamp');
        $customer = Customer::findOrFail($customer_id);
        return $customer->bookings()->where('updated_at', '>', $lastUpdateTimestamp)->get();
    }

    public function approve(Request $request)
    {
        $bookingId = $this->getMandate($request, 'booking_id');
        $booking = Booking::findOrFail($bookingId);

        if($booking->status == 'pending')
        {    
            $booking->status = 'approved';
            $booking->save();
            return $booking;
        }
        abort(403, 'the booking must be in pending status');
    }

    public function cancel(Request $request)
    {
        $bookingId = $this->getMandate($request, 'booking_id');
        $booking = Booking::findOrFail($bookingId);

        if($booking->status != 'cancelled')
        {
            $booking->status = 'cancelled';
            $booking->save();
            return $booking;
        }
        abort(403, 'The booking has already been cancelled');
    }

    public function block(Request $request)
    {
        $booking = new Booking();
        $booking->professional_id = $this->getMandate($request, 'professional_id');
        $booking->customer_id = $request->get('customer_id');
        $booking->start_time = $this->getMandate($request, 'start_time');
        $booking->service = $this->getMandate($request, 'remarks');
        $booking->booking_type = 'block';
        $booking->status = 'pending';
        $booking->save();

        return $booking;
    }
}
