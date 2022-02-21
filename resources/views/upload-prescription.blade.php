@extends('layouts.app')
@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="{{ route('users.profile', Auth::user()) }}">Schedules</a></li>
    <li class="breadcrumb-item active" aria-current="page">Details</li>
    <li class="breadcrumb-item active" aria-current="page">Recipe</li>
@endsection

@section('content')
    <section class="section">
        <div class="section-body">
            <div class="tab-pane fade show active pt-5" id="home" role="tabpanel" aria-labelledby="home-tab">
                <form action="">
                    <div class="form-group p-2 ">
                        <label for="Preview">Preview</label>
                        <div class="row mw-75 border" id="image-cont">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="profile">Prescription</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-upload" aria-hidden="true"></i></span>
                            </div>
                            <input type="file" class="form-control" id="prescription" name="" accept="image/*"
                                value="{{ old('profile') }}" id="prescription" multiple>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-outline-primary darken-3 rounded  btn-block mt-4">
                        Submit
                    </button>
                </form>
            </div>
        </div>
    </section>
    <script>
        window.onload = () => {
            let fileInput = document.getElementById('prescription')
            let imageCont = document.getElementById('image-cont')
            imageCont.style = "max-height: 400px;overflow-y: auto;"
            fileInput.addEventListener('change', preview)
            let image = document.getElementById('image')

            function preview() {
                let files = this.files;
                for(file of files) {
                    extracFile(file)
                }
            }

            function extracFile(file) {
                let fileReader = new FileReader();
                fileReader.addEventListener('load', () => {
                    console.log(fileReader.result)
                    createElement(fileReader.result)
                })
                fileReader.readAsDataURL(file)
            }

            function createElement(source) {
                let div = document.createElement('div');
                let img = document.createElement('img');
                img.src = source
                img.style = "width: 100%; height: 190px;"
                div.classList.add('col-md-4')
                div.classList.add('mb-4')
                div.appendChild(img)
                imageCont.appendChild(div)
            }
        }
    </script>
@endsection
