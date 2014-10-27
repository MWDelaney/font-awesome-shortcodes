<?php
$html = file_get_contents(dirname(__FILE__) . '/help/README.html');
?>

<script>
    jQuery(document).ready(function() {
        jQuery("#fa-selector .icon-lists a").click(function() {
            var icon = jQuery( "i", this ).attr('class').replace('fa fa-', '');
            var sendto = "[fa type=\"" + icon + "\"]";
            var win = window.dialogArguments || opener || parent || top;
            win.send_to_editor(sendto);
            jQuery('#fontawesome-shortcodes-help').modal('hide');
            return false;
        });
        
        jQuery(".fa-insert-code").click(function() {
            var example = jQuery( this ).parent().prev().find("code").text();
            var lines = example.split('\n');
            var paras = '';
            jQuery.each(lines, function(i, line) {
                if (line) {
                    paras += line + '<br>';
                }
            });
            var win = window.dialogArguments || opener || parent || top;
            win.send_to_editor(paras);
        });
        jQuery('#fontawesome-shortcodes-help h2').each(function(){
            var id = jQuery(this).attr("id");
            jQuery(this).removeAttr("id").nextUntil("h2").andSelf().wrapAll('<div class="tab-pane" id="fa-' + id + '" />');
        });

    });
</script>
<script type="text/javascript">
  jQuery(document).ready(faajustamodal);
  jQuery(window).resize(faajustamodal);
  function faajustamodal() {
    var altura = jQuery(window).height() - 155; //value corresponding to the modal heading + footer
    jQuery(".ativa-scroll").css({"height":altura,"overflow-y":"auto"});
  }
</script>

<div id="fontawesome-shortcodes-help" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4>Font Awesome Shortcodes Help</h4>  
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#fa-selector" data-toggle="tab">Icon Selector</a></li>
                    <li><a href="#fa-shortcode-reference" data-toggle="tab">Shortcode Reference</a></li>
                    <li><a href="#fa-requirements" data-toggle="tab">System Requirements</a></li>
                </ul>
        </div>
      <div class="modal-body ativa-scroll">
            <div>

        <div id="fa-top" class="tab-content">
            <div class="tab-pane active" id="fa-selector">
          
              <p class="alert alert-warning" style="margin-top: 20px;">Click an icon to automatically insert it into the WordPress editor.</p>
            <div class="list-group">
                <a class="list-group-item" href="#new">New Icons in 4.2</a>
                <a class="list-group-item" href="#web-application">Web Application Icons</a>
                <a class="list-group-item" href="#file-type">File Type Icons</a>
                <a class="list-group-item" href="#spinner">Spinner Icons</a>
                <a class="list-group-item" href="#form-control">Form Control Icons</a>
                <a class="list-group-item" href="#payment">Payment Icons</a>
                <a class="list-group-item" href="#chart">Chart Icons</a>
                <a class="list-group-item" href="#currency">Currency Icons</a>
                <a class="list-group-item" href="#text-editor">Text Editor Icons</a>
                <a class="list-group-item" href="#directional">Directional Icons</a>
                <a class="list-group-item" href="#video-player">Video Player Icons</a>
                <a class="list-group-item" href="#brand">Brand Icons</a>
                <a class="list-group-item" href="#medical">Medical Icons</a>
            </div>
            <div class="icon-lists">
                <?php include(dirname(__FILE__) . '/help/icon-list.html') ?>
            </div>    
                
            </div>  
            
            <?php
                # Put HTML content in the document
                $html = preg_replace('/(<a href="http:[^"]+")>/is','\\1 target="_blank">',$html);
                $html = str_replace('<table>', '<table class="table table-striped">', $html);
                $html = str_replace('<ul>', '<div class="list-group">', $html);
                $html = str_replace('</ul>', '</div>', $html);
                $html = str_replace('<li><a ', '<a class="list-group-item" ', $html);
                $html = str_replace('</li>', '', $html);
                $html = str_replace('href="#', 'href="#fa-', $html);
                $html = str_replace('<hr>', '<hr><a class="btn btn-link btn-default pull-right" href="#fa-top"><i class="text-muted glyphicon glyphicon-arrow-up"></i></a>', $html);
                $html = str_replace('<h3 id="', '<h3 id="fa-', $html);
                $html = str_replace('</pre>', '</pre><p><button data-dismiss="modal" class="btn btn-primary btn-sm insert-code">Insert Example <i class="glyphicon glyphicon-share-alt"></i></button></p>', $html);
                echo $html;
            ?>
        </div>
            </div>
        </div>

    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->