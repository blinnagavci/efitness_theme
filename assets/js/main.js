/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function () {
    $('#modal_form_edit_member').validate();
    $('#editaccount_form').validate();
    $('#modal_form_subscription_member').validate();
    $('#modal_form_edit_employee').validate();
    $('#modal_form_contract_employee').validate();
    $('#modal_form_add_quantity').validate();
    $('#modal_form_sell_item').validate();
    $('#modal_form_edit_item').validate();
});
if ($.isFunction($.fn.inputmask))
{
    $("[data-mask]").each(function (i, el)
    {
        var $this = $(el),
                mask = $this.data('mask').toString(),
                opts = {
                    numericInput: attrDefault($this, 'numeric', false),
                    radixPoint: attrDefault($this, 'radixPoint', ''),
                    rightAlignNumerics: attrDefault($this, 'numericAlign', 'left') == 'right'
                },
                placeholder = attrDefault($this, 'placeholder', ''),
                is_regex = attrDefault($this, 'isRegex', '');


        if (placeholder.length)
        {
            opts[placeholder] = placeholder;
        }

        switch (mask.toLowerCase())
        {
            case "phone":
                mask = "(999) 999-9999";
                break;

            case "currency":
            case "rcurrency":

                var sign = attrDefault($this, 'sign', '$');
                ;

                mask = "999,999,999.99";

                if ($this.data('mask').toLowerCase() == 'rcurrency')
                {
                    mask += ' ' + sign;
                } else
                {
                    mask = sign + ' ' + mask;
                }

                opts.numericInput = true;
                opts.rightAlignNumerics = false;
                opts.radixPoint = '.';
                break;
            case "email":
                mask = 'Regex';
                opts.regex = "[a-zA-Z0-9._%-]+@[a-zA-Z0-9-\.]+\\.[a-zA-Z]{2,4}";
                break;
            case "fdecimal":
                mask = 'decimal';
                $.extend(opts, {
                    autoGroup: true,
                    groupSize: 3,
                    radixPoint: attrDefault($this, 'rad', '.'),
                    groupSeparator: attrDefault($this, 'dec', ',')
                });
        }

        if (is_regex)
        {
            opts.regex = mask;
            mask = 'Regex';
        }

        $this.inputmask(mask, opts);
    });
}
// Datepicker
if ($.isFunction($.fn.datepicker))
{
    $(".datepicker").each(function (i, el)
    {
        var $this = $(el),
                opts = {
                    format: attrDefault($this, 'format', 'mm/dd/yyyy'),
                    startDate: attrDefault($this, 'startDate', ''),
                    endDate: attrDefault($this, 'endDate', ''),
                    daysOfWeekDisabled: attrDefault($this, 'disabledDays', ''),
                    startView: attrDefault($this, 'startView', 0),
                    rtl: rtl()
                },
                $n = $this.next(),
                $p = $this.prev();

        $this.datepicker(opts);

        if ($n.is('.input-group-addon') && $n.has('a'))
        {
            $n.on('click', function (ev)
            {
                ev.preventDefault();

                $this.datepicker('show');
            });
        }

        if ($p.is('.input-group-addon') && $p.has('a'))
        {
            $p.on('click', function (ev)
            {
                ev.preventDefault();

                $this.datepicker('show');
            });
        }
    });
}

