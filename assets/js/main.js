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
});

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

$(".input-spinner").each(function (i, el)
{
    var $this = $(el),
            $minus = $this.find('button:first'),
            $plus = $this.find('button:last'),
            $input = $this.find('input'),
            minus_step = attrDefault($minus, 'step', -1),
            plus_step = attrDefault($minus, 'step', 1),
            min = attrDefault($input, 'min', null),
            max = attrDefault($input, 'max', null);


    $this.find('button').on('click', function (ev)
    {
        ev.preventDefault();

        var $this = $(this),
                val = $input.val(),
                step = attrDefault($this, 'step', $this[0] == $minus[0] ? -1 : 1);

        if (!step.toString().match(/^[0-9-\.]+$/))
        {
            step = $this[0] == $minus[0] ? -1 : 1;
        }

        if (!val.toString().match(/^[0-9-\.]+$/))
        {
            val = 0;
        }

        $input.val(parseFloat(val) + step).trigger('keyup');
    });

    $input.keyup(function ()
    {
        if (min != null && parseFloat($input.val()) < min)
        {
            $input.val(min);
        } else

        if (max != null && parseFloat($input.val()) > max)
        {
            $input.val(max);
        }
    });

});
