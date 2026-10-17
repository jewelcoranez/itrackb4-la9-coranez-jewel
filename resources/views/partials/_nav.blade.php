<nav>
    <a href="{{ route('books.index') }}"
       class="{{ request()->is('books*') ? 'active fw-bold text-primary' : '' }}">
        All books
    </a>

    |

    <a href="{{ route('books.show', 1) }}">
        Book 1
        
    </a>
</nav>

<hr>