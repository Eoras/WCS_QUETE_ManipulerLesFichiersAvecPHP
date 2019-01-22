            </div>
            <div class="panel-footer text-right">
                <em>Classified documents</em>
            </div>
        </div>

        </div>

            <script src="assets/jquery-3.3.1.slim.min.js"></script>
            <script src="assets/bootstrap-4.2.1.min.js"></script>
            <script>
                $( document ).ready(function() {
                    $('#showPicture').on('show.bs.modal', function (event) {
                        var button = $(event.relatedTarget);
                        var recipient = button.data('file');
                        var modal = $(this);
                        modal.find('img').attr('src', recipient);
                    });

                    $('#confirmationModal').on('show.bs.modal', function (event) {
                        var button = $(event.relatedTarget);
                        var recipient = button.data('file');
                        var modal = $(this);
                        // modal.find('img').attr('src', recipient);
                        modal.find('.modal-footer input[name="file"]').val(recipient)
                    });
                });

            </script>
    </body>
</html>