(($) ->
    return unless /dispatch\.php\/admin\/plugin/.test location.href

    url     = STUDIP.URLHelper.getURL 'dispatch.php/admin/plugin/install'
    token   = $('input[name=security_token]').val()
    ticket  = $('input[name=ticket]').val()
    dropbox = $ """
                <tr id="file-dropbox">
                    <td colspan="2">
                        <form action="#{url}" method="post" enctype="multipart/form-data">
                           <input type="hidden" name="security_token" value="#{token}">
                           <input type="hidden" name="ticket" value="#{ticket}">

                           #{'Plugin via Drag and Drop hochladen'.toLocaleString()}<br>
                           <input type="file" name="upload_file">
                        </form>
                    </td>
                </tr>
                """

    $('input[type=file]', dropbox).on 'change', ->
        $(this).closest('form').submit()

    dropbox.on 'dragover', (event) ->
        dropbox.addClass 'hovered'
        event.preventDefault()
    dropbox.on 'dragleave', -> dropbox.removeClass 'hovered'

    $ ->
        dropbox.insertAfter '#infobox_content tr:eq(1)'

)(jQuery)