const statuses = {
    "3": "#56BF2F",
    "1": "#FF2C2C",
    "2": "#FFBE33"
};

var table = undefined;
$(document).ready(function () {
    table = $('#table').DataTable({
        ajax: route('receptions.list'),
        responsive: true,
        order: [0, 'desc'],
        columns: [
            {
                data: 'id',
            },
            {
                data: 'reception_date',
            },

            {
                data: null,
                render: function (data) {
                    return data.owner ? data.owner.name : '';
                }
            },

            {
                data: null,
                render: function (data) {
                    return data.car ? data.car.placas : '';
                }
            },
            {
                data: 'reason',
            },
            {
                data: null,
                render: function (data) {
                    if (data && data.status_id && statuses[data.status_id]) {
                        return `<span style="background-color: ${statuses[data.status_id]}; padding: 5px; color: black; border-radius: 5px;">
                                    ${data.status.name}
                                </span>`;
                    }
                    return '';
                }
            },
            {
                data: 'person',
            },
            {
                data: null,
                render: function (data) {
                    return data.user ? data.user.name : '';
                }
            },
            {
                data: null,
                render: function (data) {
                    return `
                        <a type="button" href="${route('receptions.edit', data.id)}" class="btn btn-sm text-primary">
                            <i class="fas fa-edit"></i>
                        </a>

                        <button type="button" class="btn btn-sm text-primary" onclick="showAlertWithCallback(() => deleteReception(${data.id}, table));">
                            <i class="fas fa-trash"></i>
                        </button>`;
                }
            },
        ],
    });
});

