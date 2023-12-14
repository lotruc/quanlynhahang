<x-app-layout>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Tên khách hàng</th>
                <th>Email</th>
                <th>Tieu de</th>
                <th>Nội dung</th>
                <th>Tùy chọn</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contact as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->subject }}</td>
                    <td>{{ $item->message }}</td>
                    <td>
                        <button id="btnDeleteContact" data-id="{{ $item->id }}" class="btn btn-danger"><i
                                class="fa-solid fa-trash-can me-2"></i>Xóa</button>
                    </td>
                </tr>
            @endforeach
            @if (count($contact) == 0)
                <td class="align-center" colspan="9"
                    style="background-color: white; font-size : 20px;text-align:center">
                    Không có liên hệ nào
                </td>
            @endif
        </tbody>
    </table>
</x-app-layout>
