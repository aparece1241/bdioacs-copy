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
                    <a download id="download-image" class="btn btn-primary text-white">Download Image</a>
                </div>
            </div>
        </div>
        
        <div class="container">
            <h3>Precription Preview</h3>
            <div class="card">
                <div class="card-body">
                    {{ $schedule->images['description'] }}
                </div>
            </div>
            <div class="row" id="image-cont">
            </div>
        </div>
    </div>
    <script>
        window.onload = () => {
            var parent = document.getElementById('image-cont')
            var preview = document.getElementById('preview')
            var downloadBtn = document.getElementById('download-image')

            let schedule = {!! $schedule !!}
            previewImage(schedule.images)

            function createElement(source) {
                let aTag = document.createElement('a')
                let div = document.createElement('div')
                // let divDesc = document.createElement('div')
                let img = document.createElement('img')

                img.src = source
                img.setAttribute('data-target', "#trigger-modal")
                img.setAttribute('data-toggle', "modal")
                img.addEventListener('click', imageClick)
                img.classList.add('border')
                img.style = "width: 100%;height: 300px; cursor: pointer;"
                
                aTag.href = 
                aTag.append(img)

                div.style = "position: relative;"
                div.classList.add('col-md-4')
                div.classList.add('mb-4')

                // divDesc.style = "height: 100px;border-left: solid 1px #e3e0e0;border-right: solid 1px #e3e0e0;border-bottom: solid 1px #e3e0e0; background-color: white"              

                div.appendChild(img)
                // div.appendChild(divDesc)

                parent.appendChild(div)
            }

            function previewImage(images) 
            {
                images = Object.values(images);
                for(let i = 0; i < (images.length - 1); i ++)
                {
                    createElement(images[i])
                }
            }

            function imageClick(event) {
                preview.src = event.target.src
                downloadBtn.href = window.URL.createObjectURL(dataURLtoFile(event.target.src, "prescription.png"));
            }
            function dataURLtoFile(dataurl, filename) {
 
                var arr = dataurl.split(','),
                    mime = arr[0].match(/:(.*?);/)[1],
                    bstr = atob(arr[1]), 
                    n = bstr.length, 
                    u8arr = new Uint8Array(n);
                    
                while(n--){
                    u8arr[n] = bstr.charCodeAt(n);
                }
                
                return new File([u8arr], filename, {type:mime});
                }
        }
    </script>
@endsection
