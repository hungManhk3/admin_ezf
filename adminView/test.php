<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>CKEditor 5 – Document editor</title>
    <script src="https://cdn.ckeditor.com/ckeditor5/41.3.0/decoupled-document/ckeditor.js"></script>
</head>
<body>
    <h1>Document editor</h1>

    <!-- The toolbar will be rendered in this container. -->
    <div id="toolbar-container"></div>

    <!-- This container will become the editable. -->
    <div id="editor">
        <p>This is the initial editor content.</p>
    </div>

    <script>
        DecoupledEditor
            .create( document.querySelector( '#editor' ) )
            .then( editor => {
                const toolbarContainer = document.querySelector( '#toolbar-container' );

                toolbarContainer.appendChild( editor.ui.view.toolbar.element );

                // Gán sự kiện "change" cho editor để lấy nội dung khi thay đổi
                editor.model.document.on('change:data', () => {
                    const content = editor.getData();
                    console.log(content);
                });
            } )
            .catch( error => {
                console.error( error );
            } );
    </script>
</body>
</html>
 