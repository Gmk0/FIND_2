<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Example 1</title>
    <link rel="stylesheet" href="style.css" media="all" />

    <style>
        .clearfix:after {
            content: "";
            display: table;
            clear: both;
        }

        a {
            color: #5D6975;
            text-decoration: underline;
        }

        body {
            position: relative;

            height: 29.7cm;
            margin: 0;
            color: #001028;
            background: #FFFFFF;
            font-family: Arial, sans-serif;
            font-size: 12px;
            font-family: Arial;
        }

        header {
            padding: 10px 0;
            margin-bottom: 30px;
        }

        #logo {
            text-align: center;
            margin-bottom: 10px;
        }

        #logo img {
            width: 90px;
        }

        h1 {
            border-top: 1px solid #5D6975;
            border-bottom: 1px solid #5D6975;
            color: #5D6975;
            font-size: 2.4em;
            line-height: 1.4em;
            font-weight: normal;
            text-align: center;
            margin: 0 0 20px 0;
            background: url(dimension.png);
        }

        #project {
            float: left;
        }

        #project span {
            color: #5D6975;
            text-align: right;
            width: 52px;
            margin-right: 10px;
            display: inline-block;
            font-size: 0.8em;
        }

        #company {
            float: right;
            text-align: right;
        }

        #project div,
        #company div {
            white-space: nowrap;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 20px;
        }

        table tr:nth-child(2n-1) td {
            background: #F5F5F5;
        }

        table th,
        table td {
            text-align: center;
        }

        table th {
            padding: 5px 20px;
            color: #5D6975;
            border-bottom: 1px solid #C1CED9;
            white-space: nowrap;
            font-weight: normal;
        }

        table .service,
        table .desc {
            text-align: left;
        }

        table td {
            padding: 20px;
            text-align: right;
        }

        table td.service,
        table td.desc {
            vertical-align: top;
        }

        table td.unit,
        table td.qty,
        table td.total {
            font-size: 1.2em;
        }

        table td.grand {
            border-top: 1px solid #5D6975;
            ;
        }

        #notices .notice {
            color: #5D6975;
            font-size: 1.2em;
        }

        footer {
            color: #5D6975;
            width: 100%;
            height: 30px;
            position: absolute;
            bottom: 0;
            border-top: 1px solid #C1CED9;
            padding: 8px 0;
            text-align: center;
        }
    </style>
</head>

<body>
    <header class="clearfix">
        <div id="logo">


            <H1>FIND</H1>
        </div>
        <h1>REPORT TRANSACTIONS</h1>
        <div id="company" class="clearfix">
            <div>FIND</div>
            <div>455 Foggy Heights,<br /> AZ 85004, US</div>
            <div>(602) 519-0450</div>
            <div><a href="mailto:company@example.com">company@find-freelance.com</a></div>
        </div>

    </header>
    <main>
        <table>
            <thead>
                <tr>
                    <th class="service">Transaction</th>
                    <th class="desc">Date</th>
                    <th>Montant</th>
                    <th>Paiment Methode</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>




                @forelse ($transactionsUser as $transaction )

                <tr>
                    <td class="service">{{$transaction?->transaction_numero}}</td>
                    <td class="desc">{{$transaction->created_at->format('d F, Y')}}</td>
                    <td class="unit">{{$transaction->amount}}</td>
                    <td class="qty">@if(isset($transaction->payment_method['brand']) )
                        CC
                        @else
                        Maxi cash
                        @endif</td>
                    <td class="total">

                        @if($transaction->status =="successfull")

                        Payer

                        @else

                        en attente

                        @endif


                    </td>
                </tr>
                @empty

                @endforelse



                <tr>
                    <td colspan="4" class="grand total">GRAND TOTAL</td>
                    <td class="grand total"></td>
                </tr>
            </tbody>
        </table>
        <div id="notices">
            <div>NOTICE:</div>
            <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
        </div>
        < div>
            </div>


    </main>
    <footer>

    </footer>


</body>

</html>