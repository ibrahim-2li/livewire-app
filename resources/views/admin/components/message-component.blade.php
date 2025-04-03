<li>
    <a class="dropdown-item" href="{{ route('admin.messages') }}">
      <span class="d-flex align-items-center align-middle">
        <i class="flex-shrink-0 bx bx-message me-2"></i>
        <span class="flex-grow-1 align-middle">Messages</span>
        @if ($message_count > 0 )
        <span class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">{{ $message_count }}</span>
        @endif
      </span>
    </a>
  </li>
