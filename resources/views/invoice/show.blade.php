<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Maven+Pro&display=swap');

    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background: #dcdcdc;
        line-height: 1.5;

    }


    hr {
        color: #0000004f;
        margin-top: 5px;
        margin-bottom: 5px
    }

    .add td {
        color: #c5c4c4;
        text-transform: uppercase;
        font-size: 12px
    }

    .content {
        font-size: 14px
    }

</style>
<body>
    <div class="container">
        <div class="container mt-5 mb-3">
            <div class="row d-flex justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="d-flex flex-row p-2"> <img src="{{ asset('img/logo/sip.png') }}" width="48">
                            <div class="d-flex flex-column"> <span class="font-weight-bold">Invoice</span>
                                <small>INV-{{ $customer->id }}</small>
                            </div>
                        </div>
                        <hr>
                        <div class="table-responsive  mx-5">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr class="add">
                                        <td>From</td>
                                        <td>To</td>
                                        <td>Day</td>
                                    </tr>
                                    <tr class="content">
                                        <td class="font-weight-bold"> {{ $customer->from_date}}</td>
                                        <td class="font-weight-bold"> {{$customer->until_date}}</td>
                                        <td class="font-weight-bold">{{$customer->days}} Days</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <hr>
                        <div class="products mx-5">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr class="add">
                                        <td>Room</td>
                                        <td class="text-center">Type</td>
                                        <td class="text-center">Room Price / Day</td>

                                    </tr>
                                    <tr class="content">
                                        <td>
                                            {{ $customer->Roomname->room_no }}</td>
                                        <td class="text-center">{{ $customer->Roomname->type->type }}
                                        </td>
                                        <td class="text-center">
                                            {{ $customer->Roomname->price }}</td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <hr>
                        <div class="products p-1">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr class="add">
                                        <td></td>
                                        <td class="text-center">Total</td>
                                        <td class="text-center">Paid Off</td>
                                        <td class="text-center">
                                            insufficient payment</td>
                                    </tr>
                                    <tr class="content">
                                        <td></td>
                                        <td class="text-center">
                                            {{ $customer->total_price }}</td>
                                        <td class="text-center">{{ $customer->payment }}</td>
                                        <td class="text-center">
                                            {{ $customer->insufficient_balance}}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <hr>
                        <div class="address p-1">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr class="add">
                                        <td>Customer Details</td>
                                    </tr>
                                    <tr class="content">
                                        <td>
                                            Customer ID : #{{ $customer->id }}
                                            <br>Customer Name : {{ $customer->name  }}
                                            <br> Customer Job : {{ $customer->job }}
                                            <br> Customer Address : {{ $customer->address }}
                                            <br>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>


</html>


