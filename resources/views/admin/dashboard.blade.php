@extends('layouts.admin')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="card border-primary mb-3" style="max-width: 50rem;">
    <div class="card-header">
        <h4>สรุปรวมทั้งหมด</h4>
    </div>
    <ul class="list-group list-group-flush">

        
        <li style="background-color: #ff8a65;" class="list-group-item">รายได้ทั้งหมด: {{ number_format($total, 2) }} ฿</li>
        <li style="background-color: #ffb74d;" class="list-group-item">รายได้วันนี้: {{ number_format($total_day, 2) }} ฿</li>
        <li style="background-color: #81d4fa;" class="list-group-item">รายได้เดือนนี้: {{ number_format($total_month, 2) }} ฿</li>
        <li style="background-color: #2baf2b;" class="list-group-item">รายได้ปีนี้: {{ number_format($total_year, 2) }} ฿</li>
    </ul>
<br>
<br>




    <div>
        <canvas id="myChart"></canvas>
    </div>

    <script>
        const ctx = document.getElementById('myChart');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['รวมทั้งหมด', 'รายได้วันนี้', 'รายได้เดือนนี้', 'รายได้ปีนี้', ],
                datasets: [{
                    label: 'ยอดรวม',
                    data: [

                        '{{$total}}', '{{$total_day}}', '{{$total_month}}', '{{$total_year}}'
                        
                    ],
                    borderWidth: 1,

                    backgroundColor: [
                        'rgba(225, 43, 6, 0.2)',
                        'rgba(255, 153, 0, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(44, 103, 0, 0.2)',

                    ],
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        
                    }
                }
            }
        });
    </script>

</div>





@endsection