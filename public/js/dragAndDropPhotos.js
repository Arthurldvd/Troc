var dropZone = document.getElementById('drop-zone');
var uploadedFiles = document.getElementById('uploaded-image');
var inputImage = document.getElementById('inputImage');

dropZone.innerText = 'Déposez votre image ici';

var tests = {
    filereader: typeof FileReader != 'undefined',
    dnd: 'draggable' in document.createElement('span'),
    formdata: !!window.FormData,
    progress: "upload" in new XMLHttpRequest
    };
  

    if (tests.dnd) {
        dropZone.ondragover = function () { this.className = 'hover'; return false; };
        dropZone.ondragend = function () { this.className = ''; return false; };
        dropZone.ondragleave = function () { this.className = ''; return false; };

        dropZone.ondrop = function (e) {
        e.preventDefault();        
        this.className = '';

        dropZone.innerText = 'Image déposée !';
        uploadedFiles.src = e.dataTransfer.getData('URL');
        inputImage.value = e.dataTransfer.getData('URL');
    }    

}