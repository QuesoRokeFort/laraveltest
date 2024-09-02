@extends('layout')
@section('title','Home Page')
@section('content')
<br>
<div class="container">
    <h1 class="mt-5">Random Image</h1>
    <!-- Input fields for width and height -->
    <div class="mb-3">
        <label for="widthInput" class="form-label">Largo:</label>
        <input type="number" id="widthInput" value="200" class="form-control" placeholder="Largo de la imagen">
        <label for="heightInput" class="form-label">Alto:</label>
        <input type="number" id="heightInput" value="300" class="form-control" placeholder="Alto de la imagen">
        <button id="applyButton" class="btn btn-primary">Apply</button>
    </div>

    <!-- Image element to display the random image -->
    <img id="avatar" loading="lazy" src="https://picsum.photos/200/300" alt="Random Image" class="img-fluid mt-3">
</div>

<script>
    document.getElementById('applyButton').addEventListener('click', function() {
        // Get the values of width and height from the input fields
        var width = document.getElementById('widthInput').value;
        var height = document.getElementById('heightInput').value;
        
        // Construct the new image URL with the specified width and height
        var newImageUrl = 'https://picsum.photos/' + width + '/' + height;
        
        // Update the src attribute of the image to the new URL
        document.getElementById('avatar').src = newImageUrl;
    });
</script>
@endsection
