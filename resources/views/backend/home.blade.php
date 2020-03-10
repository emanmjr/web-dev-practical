@extends('layouts.backend.app')

@section('content')
<div class="container">
    <div class="row ">
        <h3>My Expenses</h3>
        <br><br>
        <div class="col-md-12">
            <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">Expense Categories</th>
              <th scope="col">Total</th>
            </tr>
          </thead>
          <tbody>
            @foreach($expenses as $key => $expense)
                <tr data-id="{{ $expense->id }}">
                  <td>{{ $expense->categoryName }}</td>
                  <td>{{ $expense->totalAmount }}</td>
                </tr>
            @endforeach
          </tbody>
        </table>
        </div>
        <div class="col-md-3"></div>
        <div class="col-md-6">
             <canvas id="myChart" width="400" height="400"></canvas>
        </div>
        <div class="col-md-3"></div>
        
    </div>
</div>
@endsection

@push('after-scripts')

<script>

// Filter Data for Pie Graph
var expenses = {!! $expenses !!};
var expensesLabels = [];
var expensesData = [];
for (var i = 0; i < expenses.length; i++) {
    expensesLabels.push(expenses[i]['categoryName']);
    expensesData.push(expenses[i]['totalAmount']);
}


var ctx = document.getElementById('myChart');
var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: expensesLabels,
        datasets: [{
            label: '# of Votes',
            data: expensesData,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
@endpush
