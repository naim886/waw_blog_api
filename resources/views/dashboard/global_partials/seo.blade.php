<fieldset>
    <legend>SEO Information</legend>
    <div class="custom-input-group">
        {!! Form::label('meta_title', 'Meta Title') !!}
        {!! Form::text('meta_title', $seo->meta_title ?? null, ['class'=>'form-control form-control-sm ' .($errors->has('meta_title') ? 'is-invalid' : ''), 'placeholder'=>'Ex. Technology']) !!}
        <x-validation-error :error="$errors->first('meta_title')"/>
    </div>
    <div class="custom-input-group">
        {!! Form::label('meta_keywords', 'Meta Keywords') !!}
        {!! Form::text('meta_keywords', $seo->meta_keywords ?? null, ['class'=>'form-control form-control-sm ' .($errors->has('meta_keywords') ? 'is-invalid' : ''), 'placeholder'=>'Ex. Technology']) !!}
        <x-validation-error :error="$errors->first('meta_keywords')"/>
    </div>
    <div class="custom-input-group">
        {!! Form::label('meta_description', 'Meta Description') !!}
        {!! Form::textarea('meta_description', $seo->meta_description?? null, ['class'=>'form-control form-control-sm ' .($errors->has('meta_description') ? 'is-invalid' : ''), 'placeholder'=>'Ex. Meta Description', 'rows'=>5]) !!}
        <x-validation-error :error="$errors->first('meta_description')"/>
    </div>
    <div class="col-md-6">
        <x-image-upload :label="'Upload OG Image'" :src="image_url($category->seo->og_image ?? null, \App\Models\Seo::IMAGE_UPLOAD_PATH)" :name="'og_image'"/>
    </div>
</fieldset>
