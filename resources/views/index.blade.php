<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{route('add.mechanic')}}">
        @csrf
        <input type="text" name="name" id="" placeholder="Write Mechanic Name">
        <input type="submit" value="submit" name="" id="">
    </form>
    <br>
    <br>
    <br>
    <br>
    <form action="{{route('add.car.owner')}}">
        @csrf
        <select name="mechanic_id" id="">
            @foreach ($mechanics as $mechanic)
            <option value="{{$mechanic->id}}">{{$mechanic->name}}</option>
            @endforeach
        </select>
        <input type="text" name="model" id="" placeholder="Write Model Name">
        <input type="text" name="name" id="" placeholder="Write Car Owner Name">
        <input type="submit" value="submit" name="" id="">
    </form>
    <br>
    <br>
    <br>
    <br>
    <table border="1">
        <tr>
            <th>Mechanic</th>
            <th>Car Model</th>
            <th>Car Owner</th>
        </tr>
        @foreach ($mechanics as $mechanic)
            <tr>
                <td>{{$mechanic->name}}</td>
                <td>{{$mechanic->car->model}}</td>
                <td>{{$mechanic->owners->name}}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>