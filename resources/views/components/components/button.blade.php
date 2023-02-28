@props(['type' => 'default', 'variant' => 'default'])

<?php

$class = 'inline-flex items-center justify-center py-2 px-4 text-sm font-medium rounded shadow-sm border border-transparent';
$class .= ' focus:outline-none focus:ring-2 focus:ring-offset-2';
$class .= ' disabled:opacity-25 transition ease-in-out duration-150';

switch ($variant) {
    case 'default':
        $class .= ' bg-indigo-200 hover:bg-indigo-300 text-indigo-700';
        break;
    case 'primary':
        //$class = 'bg-blue-500 hover:bg-blue-700 text-white';
        $class .= ' bg-indigo-600 text-white hover:bg-indigo-700 focus:ring-indigo-500';

        break;
    case 'success':
        $class .= ' bg-green-500 hover:bg-green-700 text-white';
        break;
    case 'neutral':
        $class .= ' bg-gray-500 hover:bg-gray-700 text-white';
        break;
    case 'warning':
        $class .= ' bg-yellow-500 hover:bg-yellow-700 text-white';
        break;
    case 'danger':
        $class .= ' bg-red-500 hover:bg-red-700 text-white';
        break;
    case 'text':
        $class .= ' text-blue-500 hover:text-blue-700';
        break;
    default:
        $class .= ' bg-indigo-200 hover:bg-indigo-300 text-indigo-700';
        break;
}

?>

<button {{ $attributes->merge(['type' => 'submit', 'class' => $class]) }}>
	{{ $slot }}
</button>
