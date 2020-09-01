$(document).ready(function(){
    $('#btnContacts').on('click', function(e) {
        getContacts();
    });
});

function getContacts(){
    $.ajax({
        async: false,
        type: "GET",
        url: "Controllers/contactController.php",
        error: function(request) {
            alert(request.responseText);
        },
        success: function(data){
            viewTableContacts(data);
        }
    });
}

function viewTableContacts(data){
    let contacts = JSON.parse(data).result;
    let content = "";

    contacts.forEach(contact => {
        content += 
            `<tr> 
                <td> ${contact.id} </td> 
                <td> ${contact.contact_no} </td>
                <td> ${contact.lastname} </td>
                <td> ${contact.createdtime} </td>
            </tr>`;
    });

    let template = `
        <table>
            <thead>
                <th>ID</th>
                <th>Contact_no</th>
                <th>Lastname</th>
                <th>CreatedTime</th>
            </thead>
            <tbody>${content}</tbody>
        </table>
    `;
    
    $("#contacts").append(template);
}
