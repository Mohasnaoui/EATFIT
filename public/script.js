const allSideMenu = document.querySelectorAll('#sidebar .side-menu.top li a');

allSideMenu.forEach(item=> {
	const li = item.parentElement;

	item.addEventListener('click', function () {
		allSideMenu.forEach(i=> {
			i.parentElement.classList.remove('active');
		})
		li.classList.add('active');
	})
});




// TOGGLE SIDEBAR
const menuBar = document.querySelector('#content nav .bx.bx-menu');
const sidebar = document.getElementById('sidebar');

menuBar.addEventListener('click', function () {
	sidebar.classList.toggle('hide');
})







const searchButton = document.querySelector('#content nav form .form-input button');
const searchButtonIcon = document.querySelector('#content nav form .form-input button .bx');
const searchForm = document.querySelector('#content nav form');

searchButton.addEventListener('click', function (e) {
	if(window.innerWidth < 576) {
		e.preventDefault();
		searchForm.classList.toggle('show');
		if(searchForm.classList.contains('show')) {
			searchButtonIcon.classList.replace('bx-search', 'bx-x');
		} else {
			searchButtonIcon.classList.replace('bx-x', 'bx-search');
		}
	}
})
document.addEventListener("DOMContentLoaded", function() {
    const todoForm = document.getElementById('todo-form');
    const todoInput = document.getElementById('new-todo');
    const todoList = document.getElementById('todo-list');

    todoForm.addEventListener('submit', function(event) {
        event.preventDefault();
        addTodo(todoInput.value);
        todoInput.value = '';
    });

    function addTodo(task) {
        if (task.trim() === '') return;

        const li = document.createElement('li');
        li.classList.add('not-completed');

        const p = document.createElement('p');
        p.textContent = task;

        const dotsIcon = document.createElement('i');
        dotsIcon.classList.add('bx', 'bx-dots-vertical-rounded');

        const removeIcon = document.createElement('i');
        removeIcon.classList.add('bx', 'bx-trash');
        removeIcon.addEventListener('click', function() {
            li.remove();
        });

        li.appendChild(p);
        li.appendChild(dotsIcon);
        li.appendChild(removeIcon);
        todoList.appendChild(li);

        li.addEventListener('click', function() {
            li.classList.toggle('completed');
            li.classList.toggle('not-completed');
        });
    }
});






if(window.innerWidth < 768) {
	sidebar.classList.add('hide');
} else if(window.innerWidth > 576) {
	searchButtonIcon.classList.replace('bx-x', 'bx-search');
	searchForm.classList.remove('show');
}


window.addEventListener('resize', function () {
	if(this.innerWidth > 576) {
		searchButtonIcon.classList.replace('bx-x', 'bx-search');
		searchForm.classList.remove('show');
	}
})



const switchMode = document.getElementById('switch-mode');

switchMode.addEventListener('change', function () {
	if(this.checked) {
		document.body.classList.add('dark');
	} else {
		document.body.classList.remove('dark');
	}
})
document.addEventListener("DOMContentLoaded", function() {
    const todoForm = document.getElementById('todo-form');
    const todoInput = document.getElementById('new-todo');
    const todoTableBody = document.getElementById('todo-table-body');
    const switchMode = document.getElementById('switch-mode');

    // Load saved to-do list from local storage when the page loads
    loadTodoList();

    // Check if essential elements are present on the page
    if (!todoForm || !todoInput || !todoTableBody) {
        console.error("Essential elements are missing!");
        return;
    }

    // Event listener for submitting the to-do form
    todoForm.addEventListener('submit', function(event) {
        event.preventDefault();
        addTodo();
    });

    // Event listener for toggling dark mode
    switchMode.addEventListener('change', function () {
        document.body.classList.toggle('dark', this.checked);
    });

    // Event listener for adding a new to-do item
    function addTodo() {
        const task = todoInput.value.trim();
        if (task === '') return;

        const row = document.createElement('tr');
        const taskCell = document.createElement('td');
        const actionCell = document.createElement('td');

        taskCell.textContent = task;

        const completeIcon = document.createElement('i');
        completeIcon.classList.add('bx', 'bx-check-circle');
        completeIcon.addEventListener('click', toggleComplete);

        const deleteIcon = document.createElement('i');
        deleteIcon.classList.add('bx', 'bx-trash');
        deleteIcon.addEventListener('click', deleteTodo);

        actionCell.appendChild(completeIcon);
        actionCell.appendChild(deleteIcon);

        row.appendChild(taskCell);
        row.appendChild(actionCell);

        todoTableBody.appendChild(row);
        todoInput.value = '';

        // Save the updated to-do list to local storage
        saveTodoList();
    }

    // Event listener for toggling the completion status of a to-do item
    function toggleComplete(event) {
        const row = event.target.closest('tr');
        row.classList.toggle('completed');

        // Save the updated to-do list to local storage
        saveTodoList();
    }

    // Event listener for deleting a to-do item
    function deleteTodo(event) {
        const row = event.target.closest('tr');
        row.remove();

        // Save the updated to-do list to local storage
        saveTodoList();
    }

    // Function to save the to-do list to local storage
    function saveTodoList() {
        const todos = [];
        todoTableBody.querySelectorAll('tr').forEach(row => {
            const task = row.querySelector('td:first-child').textContent;
            todos.push(task);
        });
        localStorage.setItem('todoList', JSON.stringify(todos));
    }

    // Function to load the to-do list from local storage
    function loadTodoList() {
        const storedTodos = JSON.parse(localStorage.getItem('todoList'));
        if (storedTodos) {
            storedTodos.forEach(todo => {
                const row = document.createElement('tr');
                const taskCell = document.createElement('td');
                taskCell.textContent = todo;

                const actionCell = document.createElement('td');
                const completeIcon = document.createElement('i');
                completeIcon.classList.add('bx', 'bx-check-circle');
                completeIcon.addEventListener('click', toggleComplete);

                const deleteIcon = document.createElement('i');
                deleteIcon.classList.add('bx', 'bx-trash');
                deleteIcon.addEventListener('click', deleteTodo);

                actionCell.appendChild(completeIcon);
                actionCell.appendChild(deleteIcon);

                row.appendChild(taskCell);
                row.appendChild(actionCell);

                todoTableBody.appendChild(row);
            });
        }
    }
});
document.querySelectorAll('.btn-confirm').forEach(button => {
    button.addEventListener('click', function() {
        const orderId = this.getAttribute('data-order-id');
        alert('Commande ' + orderId + ' confirmée.');
    });
});
document.querySelectorAll('.btn-delete').forEach(button => {
    button.addEventListener('click', function() {
        const orderId = this.getAttribute('data-order-id');
        if (confirm('Êtes-vous sûr de vouloir supprimer la commande ' + orderId + '?')) {
            document.getElementById('order-' + orderId).remove();
            alert('Commande ' + orderId + ' supprimée.');
            
        }
    });
});
