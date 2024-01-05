<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('dosen.nilai.edit')}}" method="post">
        @csrf
        input nilai :
        <input type="number" value="0" name="nilai_akhir">
        <button type="submit">Edit nilai</button>
    </form>
</body>
</html>
