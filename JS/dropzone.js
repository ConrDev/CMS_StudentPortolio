Dropzone.options.profile = {
    // url: "../../assets/images",
    paramName: "file", // The name that will be used to transfer the file
    maxFilesize: 2, // MB
    addRemoveLinks: true,
    maxFiles: 1,
  acceptedFiles: ".jpeg,.jpg,.png,.gif",
  init: function() {
    this.on("maxfilesexceeded", function(file) {
          this.removeAllFiles();
          this.addFile(file);
          window.location = window.location.href+'?eraseCache=true';
    });
    this.on("queuecomplete", function (file) {
      window.location = window.location.href+'?eraseCache=true';
  });
}};