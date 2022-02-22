@extends('layouts.app')
@section('breadcrumbs')
    <li class="breadcrumb-item "><a href="{{ route('patients.index') }}">Patient</a></li>
    <li class="breadcrumb-item active" aria-current="page">Prescription</li>
@endsection

@section('content')
    <div class="container">
        <!-- modal -->
        <div class="modal fade" id="trigger-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <img src="" id="preview" class="w-100 h-100" alt="">
                    </div>
                </div>
            </div>
        </div>
        
        <h3>Precription Preview</h3>
        <div class="container">
            <div class="row" id="image-cont">
            </div>
        </div>
    </div>
    <script>
        window.onload = () => {
            var parent = document.getElementById('image-cont')
            var preview = document.getElementById('preview')
            let schedule = {!! $schedule !!}
            previewImage(schedule.images)

            function createElement(source) {
                let aTag = document.createElement('a')
                let div = document.createElement('div')
                let img = document.createElement('img')

                img.src = source
                img.setAttribute('data-target', "#trigger-modal")
                img.setAttribute('data-toggle', "modal")
                img.addEventListener('click', imageClick)
                img.classList.add('border')
                img.style = "width: 100%;height: 300px; cursor: pointer;"
                
                aTag.href = 
                aTag.append(img)

                div.classList.add('col-md-4')
                div.classList.add('mb-4')

                div.appendChild(img)

                parent.appendChild(div)
            }

            function previewImage(images) {
                for (image of images) {
                    createElement(image)
                }
            }

            function imageClick(event) {
                preview.src = event.target.src
            }
        }
    </script>
@endsection
