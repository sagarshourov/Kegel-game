<!-- resources/views/tournament/show.blade.php -->
<h1>{{ $tournament->name }} Leaderboard</h1>

<table>
    <tr>
        <th>Player</th>
        <th>Total Score</th>
    </tr>
    @foreach ($leaderboard as $gameScores)
        @foreach ($gameScores as $score)
            <tr>
                <td>{{ $score['player'] }}</td>
                <td>{{ $score['total_score'] }}</td>
            </tr>
        @endforeach
    @endforeach
</table>
