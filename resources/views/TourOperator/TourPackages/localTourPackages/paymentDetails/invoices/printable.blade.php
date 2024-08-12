<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$localTourPackageBooking->tourist_name}} Invoice</title>
    <style>
        .page {
            width: 180mm;
            box-sizing: border-box;
            overflow-x: auto;
            font-family: lato, sans-serif;
            page-break-inside: avoid;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 20px;
        }
        .header h1 {
            color: #333;
            font-size: 24px;
            margin: 0;
            padding: 0;
        }
        .invoice-info {
            flex-grow: 1;
        }
        .invoice-info h3 {
            margin-top: 0;
            font-size: 20px;
            margin-bottom: 5px;
        }
        .pull-right {
            text-align: right;
            flex-shrink: 0;
        }
        .content {
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border-bottom:2px solid gainsboro ;
            padding: 8px;
            text-align: left;
            font-size: 14px;
        }
        th {
            background-color: #f2f2f2;
            font-size: 12px;
        }
        .footer {
            text-align: right;
            font-weight: bold;
            border-top: 1px solid #ddd; /* Add top border */
            margin-top: 20px; /* Increase margin */
        }
        .footer p {
            margin: 5px 0;
        }
        a{
            text-decoration: none;
        }

        @media print {
            .page {
                width: auto;
                margin: 0;
                padding: 0;
            }
            .header {
                margin-bottom: 10px;
            }
            .footer {
                margin-top: 10px;
            }
        }
</style>
</head>
<body>
<?php
$imageData = base64_encode(file_get_contents(base_path('public/public/TourOperatorsLogos/'.$localTourPackageBooking->tourOperator->company_logo)));
$dataUrl = 'data:image/png;base64,' . $imageData;
?>
<table style="width: 100%">
    <tr>
        <td style="width: 10%;">
            <div class="card">
                <div class="card-body">
                    <div class="invoice-info">
                        <img src="<?php echo $dataUrl; ?>" style="width: 400px; height: 100px">
                    </div>
                </div>
            </div>
        </td>
        <td style="width: 40%">
            <div class="card">
                <div class="card-body">
                    <div class="invoice-info">
                        <h1>{{$localTourPackageBooking->tourOperator->company_name}}</h1>
                        <p style="font-size: 15px">{{$localTourPackageBooking->tourOperator->region}}</p>
                        <p style="font-size: 15px">{{$localTourPackageBooking->tourOperator->postal_code}}</p>
                        <p style="font-size: 15px">{{$localTourPackageBooking->tourOperator->phone_number}}</p>
                        <p style="font-size: 15px"><a href="{{$localTourPackageBooking->tourOperator->website_url}}">{{$localTourPackageBooking->tourOperator->website_url}}</a></p>
                        <p style="font-size: 15px"><a href="mailto:{{$localTourPackageBooking->tourOperator->email_address}}">{{$localTourPackageBooking->tourOperator->email_address}}</a></p>
                    </div>
                </div>
            </div>
        </td>
        <td style="width: 50%;">
            <div class="card">
                <div class="card-body">
                    <div class="pull-right">
                        <h3>INVOICE</h3>
                        <p style="font-size: 15px">{{$localTourPackageBooking->reference_number}}</p><br>
                        <h3>Trip name</h3>
                        <p style="font-size: 15px">{{$localTourPackageBooking->localTourPackages->touristicAttraction->attraction_name}}</p><br>
                        <h3>Trip Id</h3>
                        <p style="font-size: 15px">{{$localTourPackageBooking->localTourPackages->package_reference_number}}</p><br>
                        <h3>Travel Date</h3>
                        <p style="font-size: 15px">{{date('jS M Y',strtotime($localTourPackageBooking->localTourPackages->safari_start_date))}}</p><br>
                        <h3>DATE</h3>
                        <p style="font-size: 15px">{{date('jS-M-Y')}}</p><br>
                        <h3>DUE</h3>
                        <p style="font-size: 15px">On Receipt</p><br>
                    </div>
                </div>
            </div>
        </td>
    </tr>
</table>

<div class="card">
    <div class="card-body">
            <div>
                <table>
                    <tr>
                        <td>
                            <div class="invoice-bill-to">
                                <h4>BILL TO</h4>
                                <p>{{$localTourPackageBooking->tourist_name}}</p>
                                <p>{{$localTourPackageBooking->phone_number}}</p>
                                <p><a href="mailto:{{$localTourPackageBooking->email_address}}">{{$localTourPackageBooking->email_address}}</a></p>
                                <p>To be picked up at <span style="color: dodgerblue"> {{$localTourPackageBooking->collectionStop->collection_stop_name}}</span> where each traveller has an increment of price by <span style="color: dodgerblue"> Tsh {{number_format($localTourPackageBooking->collectionStop->collection_stop_price)}}</span></p>

                                @if($localTourPackageReservations)
                                    <p>Reservations allocated for safari</p>
                                    @forelse($localTourPackageReservations as $localTourPackageReservation)
                                        <div>
                                            <ul style="list-style: none">
                                                <li>{{$localTourPackageReservation->reservation_name}}</li>
                                            </ul>
                                        </div>
                                    @empty
                                        <p style="background-color: navajowhite">This safari does not offer reservation</p>
                                    @endforelse
                                @else
                                @endif
                            </div>
                        </td>
                    </tr>
                </table>
                <table>
                    <thead>
                    <tr>
                        <th>Particular</th>
                        <th>Category</th>
                        <th>Travellers</th>
                        <th>Amount Each</th>
                        <th>Pickup Amount</th>
                        <th>Total Amount</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{ $localTourPackageBooking->localTourPackages->touristicAttraction->attraction_name }}</td>
                        <td>Resident Child</td>
                        <td>{{number_format($localTourPackageBooking->total_number_local_child) }}</td>
                        <td>@ Tsh {{ number_format($localTourPackageBooking->localTourPackages->trip_price_child_tanzanian) }}</td>
                        <?php
                        $residentChildPrice = (($localTourPackageBooking->total_number_local_child) * ($localTourPackageBooking->localTourPackages->trip_price_child_tanzanian) + ($localTourPackageBooking->collectionStop->collection_stop_price) * ($localTourPackageBooking->total_number_local_child));
                        ?>
                        <td>@ Tsh {{number_format($localTourPackageBooking->collectionStop->collection_stop_price)}}</td>
                        <td>Tsh {{ number_format($residentChildPrice) }}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Non Resident Child</td>
                        <td>{{number_format( $localTourPackageBooking->total_number_foreigner_child) }}</td>
                        <td>@ Tsh {{ number_format($localTourPackageBooking->localTourPackages->trip_price_child_foreigner) }}</td>
                        <?php
                        $nonResidentChildPrice = (($localTourPackageBooking->total_number_foreigner_child) * ($localTourPackageBooking->localTourPackages->trip_price_child_foreigner) + ($localTourPackageBooking->collectionStop->collection_stop_price) * ($localTourPackageBooking->total_number_foreigner_child));
                        ?>
                        <td>@ Tsh {{number_format($localTourPackageBooking->collectionStop->collection_stop_price)}}</td>
                        <td>TSh {{ number_format($nonResidentChildPrice) }}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Resident Adult</td>
                        <td>{{number_format($localTourPackageBooking->total_number_local_adult) }}</td>
                        <td>@ Tsh {{ number_format($localTourPackageBooking->localTourPackages->trip_price_adult_tanzanian) }}</td>
                        <?php
                        $residentAdultPrice = (($localTourPackageBooking->total_number_local_adult) * ($localTourPackageBooking->localTourPackages->trip_price_adult_tanzanian) + (($localTourPackageBooking->collectionStop->collection_stop_price) * ($localTourPackageBooking->total_number_local_adult)));
                        ?>
                        <td>@ Tsh {{number_format($localTourPackageBooking->collectionStop->collection_stop_price)}}</td>
                        <td>Tsh {{ number_format($residentAdultPrice) }}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Non Resident Adult</td>
                        <td>{{number_format($localTourPackageBooking->total_number_foreigner_adult) }}</td>
                        <td>@ TSh {{ number_format($localTourPackageBooking->localTourPackages->trip_price_adult_foreigner) }}</td>
                        <?php
                        $nonResidentAdultsPrice = (($localTourPackageBooking->total_number_foreigner_adult) * ($localTourPackageBooking->localTourPackages->trip_price_adult_foreigner) + (($localTourPackageBooking->collectionStop->collection_stop_price) * ($localTourPackageBooking->total_number_foreigner_adult)));
                        ?>
                        <td>@ Tsh {{number_format($localTourPackageBooking->collectionStop->collection_stop_price)}}</td>
                        <td> Tsh {{ number_format($nonResidentAdultsPrice) }}</td>
                    </tr>
                    <tr style="background-color: dodgerblue;color: white;border: 2px solid white">
                        <td colspan="5">Amount for visiting {{$localTourPackageBooking->localTourPackages->touristicAttraction->attraction_name}}</td>
                        <?php $totalBillForAnAttraction=$residentChildPrice + $nonResidentChildPrice + $residentAdultPrice + $nonResidentAdultsPrice; ?>
                        <td> Tsh {{ number_format($totalBillForAnAttraction) }}</td>
                    </tr>
                    <?php
                    $totalBillForAReservation = 0;
                    ?>
                    @if($localTourPackageBooking->reservation_id > 0)
                        <tr>
                            <td>{{$localTourPackageBooking->tourOperatorReservation->reservation_name}}</td>
                            <td>Resident Child</td>
                            <td>{{number_format($localTourPackageBooking->total_number_local_child) }}</td>
                            <td>@ {{$localTourPackageBooking->tourOperatorReservation->resident_child_price_reservation }}</td>
                                <?php
                                $residentChildReservationPrice = (($localTourPackageBooking->total_number_local_child ) * ($localTourPackageBooking->tourOperatorReservation->resident_child_price_reservation));
                                ?>
                            <td>@ Tsh 0.00</td>
                            <td>Tsh {{number_format($residentChildReservationPrice)}}</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Non Resident Child</td>
                            <td>{{number_format($localTourPackageBooking->total_number_foreigner_child) }}</td>
                            <td>@ {{$localTourPackageBooking->tourOperatorReservation->foreigner_child_price_reservation }}</td>
                                <?php
                                $nonResidentChildReservationPrice = (($localTourPackageBooking->total_number_local_child ) * ($localTourPackageBooking->tourOperatorReservation->foreigner_child_price_reservation));
                                ?>
                            <td>@ Tsh 0.00</td>
                            <td>Tsh {{number_format($nonResidentChildReservationPrice)}}</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Resident Adult</td>
                            <td>{{number_format($localTourPackageBooking->total_number_local_adult) }}</td>
                            <td>@ {{$localTourPackageBooking->tourOperatorReservation->resident_adult_price_reservation }}</td>
                                <?php
                                $residentAdultReservationPrice = (($localTourPackageBooking->total_number_local_adult ) * ($localTourPackageBooking->tourOperatorReservation->resident_adult_price_reservation));
                                ?>
                            <td>@ Tsh 0.00</td>
                            <td>Tsh {{number_format($residentAdultReservationPrice)}}</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Non Resident Adult</td>
                            <td>{{number_format($localTourPackageBooking->total_number_foreigner_adult) }}</td>
                            <td>@ {{$localTourPackageBooking->tourOperatorReservation->foreigner_adult_price_reservation }}</td>
                                <?php
                                $nonResidentAdultReservationPrice = (($localTourPackageBooking->total_number_foreigner_adult ) * ($localTourPackageBooking->tourOperatorReservation->foreigner_adult_price_reservation));
                                ?>
                            <td>@ Tsh 0.00</td>
                            <td>Tsh {{number_format($nonResidentAdultReservationPrice)}}</td>
                        </tr>
                        <tr style="background-color: dodgerblue; color: white; border: 2px solid white;">
                            <td colspan="5">Amount for using {{$localTourPackageBooking->tourOperatorReservation->reservation_name}} reservation while visiting {{$localTourPackageBooking->localTourPackages->touristicAttraction->attraction_name}}</td>
                                <?php
                                $totalBillForAReservation = $residentChildReservationPrice + $nonResidentChildReservationPrice + $residentAdultReservationPrice + $nonResidentAdultReservationPrice;
                                ?>
                            <td> Tsh {{ number_format($totalBillForAReservation) }}</td>
                        </tr>

                    @else
                        <tr>
                            <td colspan="6" style="background-color: navajowhite">No reservation was selected either</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
            <div class="footer">
                <div class="invoice-total pull-right">
                    <p><strong style="color: dodgerblue">Sub Total:</strong> Tsh {{number_format($totalBillForAnAttraction + $totalBillForAReservation)}}</p>
                    <p><strong style="color: dodgerblue">Discount:</strong> {{$localTourPackageBooking->discount}}%</p>
                    <p><strong style="color: dodgerblue">VAT:</strong> Inclusive</p>
                    <?php $balanceDue = ($totalBillForAnAttraction + $totalBillForAReservation)  - ($totalBillForAnAttraction + $totalBillForAReservation) * ($localTourPackageBooking->discount / 100); ?>
                    <p><strong style="color: dodgerblue">Balance Due:</strong> TZS {{number_format($balanceDue)}}</p>
                </div>
            </div>
        <br><br>
        <p style="text-align: center;">"Thanks for using Xafari Explore. We are just being useful by thinking differently" <br> &copy;{{date('Y')}}</p>
        </div>
    </div>
</body>
</html>
