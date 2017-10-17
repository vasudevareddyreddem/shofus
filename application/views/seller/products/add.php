
<div class="content-wrapper mar_t_con"  >
	<!DOCTYPE html>
<html>
<head>
    
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.js"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <!-- form: -->
        <section>
            <div class="col-lg-8 col-lg-offset-2">
                <div class="page-header">
                    <h2>Dynamic fields</h2>
                </div>

                <form id="defaultForm" method="post" class="form-horizontal" action="target.php">
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Textbox</label>
                        <div class="col-lg-5">
                            <input class="form-control" type="text" name="textbox[]" placeholder="Textbox #1" />
                        </div>
                        <div class="col-lg-4">
                            <button type="button" class="btn btn-default btn-sm addButton" data-template="textbox">Add</button>
                        </div>
                    </div>
                    <div class="form-group hide" id="textboxTemplate">
                        <div class="col-lg-offset-3 col-lg-5">
                            <input class="form-control" type="text" />
                        </div>
                        <div class="col-lg-4">
                            <button type="button" class="btn btn-default btn-sm removeButton">Remove</button>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-3 control-label">Checkbox</label>
                        <div class="col-lg-5">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="checkbox[]" value="Choice #1" /> Choice <button type="button" class="btn btn-default btn-sm addButton" data-template="checkbox">Add</button>
                                </label>
                            </div>

                             <div class="checkbox hide template" id="checkboxTemplate">
                                <label>
                                    <input type="checkbox" value="1" /> <span class="lbl">Choice</span> <button type="button" class="btn btn-default btn-sm removeButton">Remove</button>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-3 control-label">Radio</label>
                        <div class="col-lg-5">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="radio[]" value="Choice #1" /> Choice <button type="button" class="btn btn-default btn-sm addButton" data-template="radio">Add</button>
                                </label>
                            </div>

                             <div class="radio hide" id="radioTemplate">
                                <label>
                                    <input type="radio" value="1" /> <span class="lbl">Choice</span> <button type="button" class="btn btn-default btn-sm removeButton">Remove</button>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-offset-3 col-lg-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <!-- :form -->
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('.addButton').on('click', function() {
            var index = $(this).data('index');
            if (!index) {
                index = 1;
                $(this).data('index', 1);
            }
            index++;
            $(this).data('index', index);

            var template     = $(this).attr('data-template'),
                $templateEle = $('#' + template + 'Template'),
                $row         = $templateEle.clone().removeAttr('id').insertBefore($templateEle).removeClass('hide'),
                $el          = $row.find('input').eq(0).attr('name', template + '[]');
            $('#defaultForm').bootstrapValidator('addField', $el);

            // Set random value for checkbox and textbox
            if ('checkbox' == $el.attr('type') || 'radio' == $el.attr('type')) {
                $el.val('Choice #' + index)
                   .parent().find('span.lbl').html('Choice #' + index);
            } else {
                $el.attr('placeholder', 'Textbox #' + index);
            }

            $row.on('click', '.removeButton', function(e) {
                $('#defaultForm').bootstrapValidator('removeField', $el);
                $row.remove();
            });
        });

        $('#defaultForm')
            .bootstrapValidator({
                message: 'This value is not valid',
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    'textbox[]': {
                        validators: {
                            notEmpty: {
                                message: 'The textbox field is required'
                            }
                        }
                    },
                    'checkbox[]': {
                        validators: {
                            notEmpty: {
                                message: 'The checkbox field is required'
                            }
                        }
                    },
                    'radio[]': {
                        validators: {
                            notEmpty: {
                                message: 'The radio field is required'
                            }
                        }
                    }
                }
            })
            .on('error.field.bv', function(e, data) {
                //console.log('error.field.bv -->', data.element);
            })
            .on('success.field.bv', function(e, data) {
                //console.log('success.field.bv -->', data.element);
            })
            .on('added.field.bv', function(e, data) {
                //console.log('Added element -->', data.field, data.element);
            })
            .on('removed.field.bv', function(e, data) {
                //console.log('Removed element -->', data.field, data.element);
            });
    });
</script>
<script>

</script>
</body>
</html>
</div>

  

		