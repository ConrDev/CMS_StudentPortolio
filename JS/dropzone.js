Dropzone.options.cvUpload = {
  // url: "../../assets/images",
  paramName: "file", // The name that will be used to transfer the file
  maxFilesize: 2, // MB
  addRemoveLinks: true,
  uploadMultiple: false,
  parallelUploads: 1,
  maxFiles: 1,
  acceptedFiles: ".pdf, .jpg, .jpeg, .png",
  init: function() {
      console.log("ola seniorita");
    this.on("maxfilesexceeded", function(file) {
          this.removeAllFiles();
          this.addFile(file);
                   
          // window.location = window.location.href+'?eraseCache=true';
        // window.location.href = '../dashboard/pages.php';
    });
    this.on("complete", function(file) {          
        // window.location = ;  
    });
    this.on("queuecomplete", function (file) {
        // window.location.href = '../dashboard/pages.php';
      // window.location = window.location.href+'?eraseCache=true';
  });
}};


