<!DOCTYPE html>
<html lang="arabic">

<head>
    @include('layouts/css_links')
    <meta charset="UTF-8">
    <title>تقييم</title>
<style>
    .back{
    color: white;
    background: #bd5d14;
    border-radius: 80px;
    height: 30px;
    text-align: center;
    text-decoration: none;
    margin-top:10px;
    }
    .error{
    /* margin-bottom: 20px; */
    display: grid;
    grid-column: 4/9;
    }
</style>
    <link rel="stylesheet" href="{{ asset('assets/css/sakany(feedback).css') }}">
    @include('layouts.feedback_style')
</head>

<body>

    <form class="container" action="{{ route('feedback.store') }}" style="box-shadow: 0 0 10px 0 #ddd;" method="POST"
        autocomplete="off">
        <a href="{{ route('home') }}" class="back">رجوع</a>

        <p class="quistin-1"> ما رايك في الموقع ؟؟</p>

        @csrf
        <div class="rate rating">
            <input type="radio" id="star5" class="rate " name="rating" value="5" />
            <label for="star5" title="text">5 stars</label>
            <input type="radio" id="star4" class="rate" name="rating" value="4" />
            <label for="star4" title="text">4 stars</label>
            <input type="radio" id="star3" class="rate" name="rating" value="3" />
            <label for="star3" title="text">3 stars</label>
            <input type="radio" id="star2" class="rate" name="rating" value="2">
            <label for="star2" title="text">2 stars</label>
            <input type="radio" id="star1" class="rate" name="rating" value="1" />
            <label for="star1" title="text">1 star</label>
        </div>
        <textarea name="comment" id="" cols="30" rows="10"
            class="form-control @error('comment') is-invalid @enderror text" placeholder="اترك رساله لنا"></textarea>
            @error('comment')
            <span class="invalid-feedback error"  role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <button class="send" type="submit">ارسال</button>
        <img src="{{ asset('assets/imeges/img (2).png') }}" alt="" class="img1">

    </form>



</body>

</html>
