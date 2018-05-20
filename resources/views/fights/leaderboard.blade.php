@include('header')
<table class="table table-striped">
<thead>
    <tr>
    <th>Name</th>
    <th>Strength</th>
    <th>Wins</th>
    <th>League</th>
    </tr>
</thead>
<tbody>
    @foreach ($leaderboard as $row)
    <tr>
        <td>{{ $row->FighterName }}</td>
        <td>{{ $row->strength }}</td>
        <td>{{ $row->wins }}</td>
        <td>{{ $row->League }}</td>
    </tr>
    @endforeach
</tbody>
</table>
@include('footer')