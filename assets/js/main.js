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
