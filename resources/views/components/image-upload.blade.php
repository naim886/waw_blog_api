<label>{{$label}}</label>
<div class="image-upload-container">
    <input class="d-none image_upload_input" type="file" name="{{$name}}">
    <img src="{{asset('image/asset/bg.jpg')}}" alt="image upload photo"
         class="image_upload_bg"/>
    <div class="overly"></div>
    <i class="fa-solid fa-camera image_upload_icon"></i>
</div>
