<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Report</title>
</head>
<body>
    

    <h2>Users Report</h1>
    <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Number Of Tweets</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($users as $index => $user)
                
            <tr>
                <th scope="row">{{ $index +1 }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->tweet_count }}</td>
               
            </tr>
            @endforeach
       
        </tbody>
      </table>

      <h6> Users Tweet Avrage : {{ $tweetAvg }}</h6>
</body>
</html>