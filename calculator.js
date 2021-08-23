
function concatAndInsertText(element_id, text)
{
  document.getElementById(element_id).value += text;
}
function calculate(element_id)
{
  try
    {
     jQuery("#" + element_id).val(eval($("#" + element_id).val()));
    }
  catch(err)
    {
      alert('Invalid expression!');
    }
}
