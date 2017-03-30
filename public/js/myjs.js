function searchFocus()
{
    var x = document.getElementById('btnFocus');
    var content = x.innerHTML;
    var f = document.getElementById('formSearch');
    var liForm = document.getElementById('liForm');
    var l1 = document.getElementById('li1');
    var l2 = document.getElementById('li2');
    var l3 = document.getElementById('li3');
    var l4 = document.getElementById('li4');
    if (content == '<img src="public/icons/search-icon.png" alt="Search Icon">') {
        x.innerHTML = '<img src="public/icons/delete.png" alt="Delete Search">';
    }
    else {
        x.innerHTML = '<img src="public/icons/search-icon.png" alt="Search Icon">';
    }
    if(f.className == 'form-search') {
        f.className = ' form-search-focus';
        x.innerHTML = '<img src="public/icons/delete.png" alt="Delete Search">';
        l1.className = 'li-focus-hidden';
        l2.className = 'li-focus-hidden';
        l3.className = 'li-focus-hidden';
        l4.className = 'li-focus-hidden';
        liForm.className +=  ' li-form';

    }
    else {
        f.className = 'form-search';
        x.innerHTML = '<img src="public/icons/search-icon.png" alt="Search Icon">';
        l1.className = '';
        l2.className = '';
        l3.className = '';
        l4.className = '';
        liForm.className -= ' li-form';
    }
}
