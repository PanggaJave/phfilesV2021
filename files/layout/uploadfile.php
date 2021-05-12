
<style>
    .btn {
        margin-right: 1px;
        margin-top: 2px;
    }
    .hidden
    {
        display: none;
    }
</style>
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">List of Uploaded File</h3>
              </div>
              <div class="card-body">
              <div class="container">
                <div class="form">
                    <div class="file-upload-wrapper" data-text="Select your file!">                    
                        <div class="row">
                            <div class="col-md-6">
                                <input name="fileupload" id="fileupload" type="file" class="btn btn-file" value="" onchange="func_select();">
                            </div> 
                            <div class="col-md-6">
                                <button class="btn btn-info" id="btn_uploadfile" onclick="uploadFile()"> Upload now</button>
                            </div>   
                        </div>  
                    </div>
                </div>                
                </div><br>
                <div class="container hidden" id="fileInfo">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="col-lg-6">File Name: </div>  
                            <div class="col-lg-6">
                                <input id="filename" class="form-control" disabled>
                            </div>  
                        </div>
                        <div class="col-lg-6">
                        <div class="col-lg-6"> File type:</div>  
                            <div class="col-lg-6">
                                <input id="filetype" class="form-control" disabled>
                            </div> 
                        </div>
                        <div class="col-lg-6">
                            <div class="col-lg-6"> File size:</div>  
                            <div class="col-lg-6">
                                <input id="filesize" class="form-control" disabled>
                            </div> 
                        </div>
                        <div class="col-lg-6">
                            <div class="col-lg-6"> File status:</div>  
                            <div class="col-lg-6">
                                <input id="filestatus" class="form-control" disabled>
                            </div> 
                        </div><br>
                                  
                        <div class="col-lg-12">
                            <div class="col-lg-6"> File Description:</div>  
                            <div class="col-lg-12">
                                <textarea id="filedescription" class="form-control"></textarea>
                            </div> 
                        </div>             
                    </div>
                </div>
                <div class="container hidden" id="progressHtml">
                    <div class="progress" >
                    <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:100%">40%</div>
                    </div>
                </div>
                <br>
                <div class="container hidden" id="share_link">
                <div class="row">
                       <div class="col-lg-12">
                           <div class="col-lg-6">Shared Link: </div>  
                            <div class="col-lg-12">
                               <input id="fileSharedLink" class="form-control" disabled value="">
                            </div>  
                        </div>                        
                    </div>
                </div>
                
              </div>
            </div>
          </div>
        </div>
      </div>
</section>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script >

function _(el)
{
    return document.getElementById(el);
}

function uploadFile()
{
  debugger;

    // for(var i = 0; i<= 10000; i++)
    // {
    //     var per = Math.round(((i / 10000) * 100) * 100);
    //     var ss = '<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="'+per+'" aria-valuemin="0" aria-valuemax="100"> '+per+'% </div>';
    //     _("progressHtml").innerHTML=  ss;
    // }
    _("btn_uploadfile").setAttribute('disabled','disabled');
    _("fileInfo").classList.add("hidden");
    _("share_link").classList.remove("hidden");
    var link = "https://stackoverflow.com/questions/584751/inserting-html-into-a-div";
    debugger;
    var _html = ' <div class="row">' +
                       '<div class="col-lg-12">'+
                         '   <div class="col-lg-6">Shared Link: </div>  ' +
                            '<div class="col-lg-12">' +
                               '<input id="fileSharedLink" class="form-control" disabled value="'+link+'">' +
                            '</div>  ' +
                       ' </div>                        ' +         
                   ' </div>';
    _("share_link").innerHTML=  _html;
}

function func_select()
{
    debugger;
    var file = _("fileupload").files[0];
    var fileName = file.name;
    var a = fileName.split('.');
    var fileext = a[a.length - 1];
    var filesize = file.size;
    var filetype = file.type;
    
    var _size = filesize_validator(filesize);
    var stat = filesize > (1050625000 * 2) ? "fail" : "OK";
    _("filename").value = fileName;
    _("filetype").value = filetype;
    _("filesize").value = _size;
    //_("fileextension").value = fileext;
    _("filestatus").value = stat;

    _("btn_uploadfile").removeAttribute("disabled");
    _("fileInfo").classList.remove("hidden");
    _("share_link").classList.add("hidden");

    //btn_uploadfile
    //1KB = 1025bit
    //1mb = 1000kb 
    //1gb = 1025mb

   
    //alert(sss);
}

function filesize_validator(size)
{
    debugger;
    var ret = "";
    if (size < 1025000)
    {
        ret = (size / 1025) + " KB";
    }
    else if(size < 1050625000)
    {
        ret = (size / 1025000) + " MB";
    }
    else{
        ret = (size / 1050625000) + " GB";
    }
    return ret;
}
</script>