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
                <form method="post" action="">
                    <div class="form-group p-2 ">
                        <label for="Preview">Preview</label>
                        <div class="row mw-75 border" id="image-cont">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description">Prescription Description</label>
                        <div class="input-group">
                            <textarea id="description" class="form-control" placeholder="Prescription Description" name="" id="" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="profile">Prescription</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-upload" aria-hidden="true"></i></span>
                            </div>
                            <input type="file" class="form-control" id="prescription" name="images[]" accept="image/*"
                                value="{{ old('profile') }}" id="prescription" multiple>
                        </div>
                    </div>
                    <button type="button" id="submit" class="btn btn-outline-primary darken-3 rounded  btn-block mt-4">
                        Submit
                    </button>
                </form>
            </div>
        </div>
    </section>
    <script>
        window.onload = () => {
            // initialization
            let fileInput = document.getElementById('prescription')
            let submitBtn = document.getElementById('submit')
            let imageCont = document.getElementById('image-cont')
            let description = document.getElementById('description')
            imageCont.style = "max-height: 400px;overflow-y: auto;"

             // get schedule
             let schedule = {!! $schedule !!}
            if (schedule.images) {
            let images = Object.values(schedule.images);
                for(let i = 0; i < (images.length - 1); i++)
                {
                    createElement(images[i])
                }
                description.innerText = images[images.length - 1] ?? '';
            }

            fileInput.addEventListener('change', preview)
            submitBtn.addEventListener('click', submit)
            let image = document.getElementById('image')
            let formData = new FormData();


            function preview() {
                imageCont.innerHTML = '';
                let files = this.files;
                for(file of files) {
                    extracFile(file)
                }
            }

            function extracFile(file) {
                let fileReader = new FileReader();
                fileReader.addEventListener('load', () => {
                    formData.append('images[]', fileReader.result)
                    createElement(fileReader.result)
                })
                fileReader.readAsDataURL(file)
            }

            function createElement(source) {
                let div = document.createElement('div');
                let img = document.createElement('img');
                img.src = source
                img.style = "width: 100%; height: 300px;"
                div.classList.add('col-md-4')
                div.classList.add('mb-4')
                div.appendChild(img)
                imageCont.appendChild(div)
            }

            function submit() {

                formData.append('description', description.value)
                if (!fileInput.files.length && !description.value)
                {
                    location.href = `${location.origin}/users/${{!! Auth::user()->id !!}}/profile`
                    return;
                }

                fetch(`${location.origin}/api/doctors/${{!! $schedule->id !!}}/upload/prescription`, {
                    method: "POST",
                    body: formData,
                }).then(response => response.json()).then(data => {
                    alert('Successfully uploaded!');
                    setTimeout(() => {
                        if (data.message) {
                            location.href = `${location.origin}/users/${{!! Auth::user()->id !!}}/profile`
                        }
                    }, 1000);
                }).catch(e => 
                    {
                        alert("Something wen't wrong!");
                    }
                )
            }
        }
    </script>
@endsection
