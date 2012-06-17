Vinaora Vietnamese Alias (VietAlias)
====================================

[Vinaora Vietnamese Alias](http://vinaora.com/vinaora-vietalias/) (VietAlias) là Plugin tạo trường bí danh (Alias) và đường link của bài viết, hoặc của bất kỳ một đối tượng nào khác (menu, category, banner, weblink...) trong Joomla bằng chuỗi tiếng Việt không dấu, chữ thường và phân tách giữa các từ bằng dấu gạch ngang.

VD: Nếu tiêu đề bài viết là: `Giới thiệu chung về Trường Đại học Bách Khoa Hà Nội` thì bí danh (alias) của nó sẽ là: `gioi-thieu-chung-ve-truong-dai-hoc-bach-khoa-ha-noi`

Tính năng
---------

* Mã nguồn mở, hoàn toàn miễn phí
* Tương thích hoàn toàn với Joomla 2.5, Joomla 1.6/1.7
* Hỗ trợ tất cả các thành phần mở rộng (extension) được cài đặt thêm từ các hãng thứ ba
* Xử lý triệt để vấn đề lỗi, mất ký tự (1) trong các đường link, trường bí danh (Alias) của Joomla
* Tạo các đường link thực sự an toàn (2), thân thiện giúp SEO hiệu quả
* Cho phép nạp trên tất cả các trang khi soạn thảo (3) hoặc chỉ nạp trên một số trang chuyên biệt (4)
* Tự động hoàn thiện (5) trường bí danh (Alias) ngay khi gõ phần tiêu đề (Title/Name)
* Hỗ trợ cả tiếng Việt Unicode dựng sẵn và Unicode tổ hợp (6)
* Loại bỏ hoàn toàn các ký tự đặc biệt (7)
* Hỗ trợ cả phần tiền sảnh (front-end) và phần hậu sảnh (back-end) của Joomla
* Không phụ thuộc vào việc đã cài đặt gói ngôn ngữ Việt Nam hay chưa (8)
* Được đóng gói trong plugin, nên không gây ảnh hưởng khi nâng cấp Joomla
* Mã nguồn được nghiên cứu cẩn thận và tối ưu về hiệu suất
* Tiết kiệm thời gian và công sức nhập liệu

Giải thuật chính khi chuyển đổi tiếng Việt
------------------------------------------

* Bước 1: Loại bỏ 5 dấu thanh (huyền, hỏi, ngã, sắc, nặng) nếu có tiếng Việt Unicode tổ hợp
* Bước 2: Thay thế các ký tự đặc biệt `@#$%^&*-_+=`... bằng các khoảng trắng
* Bước 3: Thay thế 11 nguyên âm của tiếng Việt gồm `[a|ă|â],[e|ê],i,[o|ơ],[u|ư],y` (có hoặc không kèm dấu thanh) bằng 05 nguyên âm tiếng Anh tương ứng `a,e,i,o,u,y` và phụ âm `đ/Đ` bằng ký tự `d`
* Bước 4: Chuẩn hóa chuỗi ký tự (đảm bảo các ký tự được phép chỉ gồm `a-z, 0-9` và dấu gạch ngang `-`; thay thế các khoảng trắng bằng dấu gạch ngang...)
* **Kết quả đầu ra**: Chuỗi ký tự tiếng Việt không dấu, chữ thường, chỉ gồm các chữ cái tiếng Anh a-z, các chữ số từ 0-9 và phân tách giữa các từ bằng dấu gạch ngang.

Lưu ý
-----
* Đối với các đường link, trường bí danh (alias) đã có trước khi cài đặt plugin **Vinaora VietAlias** bạn cần phải tự tay xóa từng trường bí danh và nhân nút 'Lưu' (Save) để plugin tạo lại chuỗi ký tự mới thay thế.
* Tính năng tự động hoàn thiện bằng Ajax có thể gặp trục trặc nếu bạn đã vô hiệu hóa thư viện Mootools của Joomla.

Chú giải
--------

* (1): Hàm xử lý chuỗi ký tự Unicode theo mặc định của Joomla làm mất một số ký tự tiếng Việt
* (2): Lọc bỏ các ký tự không được phép
* (3): Trang soạn thảo được xác định qua biến HTTP Request `$task=edit`
* (4): Các trang chuyên biệt được xác định qua biến HTTP Request `$option=com_xyz`
* (5): Sử dụng Ajax + thư viện Mootools của Joomla.
* (6): Nhiều plugin/tool bỏ quên không xử lý với các chuỗi Unicode tổ hợp.
* (7): Quá trình loại bỏ vẫn đảm bảo việc thay thế phù hợp khi các dấu phân tách câu (dấu phảy, dấu chấm...) bị đặt sai chính tả.
* (8): Giải thuật xử lý có thể được đưa vào file `vi-VN.localise.php` của gói ngôn ngữ tiếng Việt (vi-VN) thay vì phải cài đặt plugin này. Tuy nhiên trong trường hợp người quản trị chưa cài gói ngôn ngữ vi-VN hoặc chọn ngôn ngữ khác làm ngôn ngữ mặc định thay vì vi-VN thì lỗi mất ký tự tiếng Việt vẫn xảy ra.

Ủng hộ
------

Để ủng hộ cho việc duy trì và phát triển plugin Vinaora Vietnamese Alias (VietAlias), bạn có thể chọn một trong các cách sau:

Cài đặt và chia sẻ với mọi người ^_^

Mua Hosting tại 01 trong 02 nhà cung cấp Hosting nổi tiếng:

* [InmotionHosting](https://secure1.inmotionhosting.com/cgi-bin/gby/clickthru.cgi?id=vinaora&page=5) (Link: http://goo.gl/dfN4F ): chạy nhanh và tin cậy (khuyến cáo)
* [Hostgator](http://secure.hostgator.com/~affiliat/cgi-bin/affiliates/clickthru.cgi?id=vinaora) (Link: http://goo.gl/PoRVo ): giá rẻ và được nhiều website sử dụng (điền mã giảm giá `H25PERCENT` để giảm ngay 25%)

Link
----

* Homepage: http://vinaora.com/
* Sourcecode: https://github.com/vinaora/vinaora-vietalias/
* Download: https://github.com/vinaora/vinaora-vietalias/downloads
* Pull Requests: https://github.com/vinaora/vinaora-vietalias/pulls
* Issues: https://github.com/vinaora/vinaora-vietalias/issues

Ý kiến đóng góp
---------------

Mọi ý kiến đóng góp xin liên hệ với: **vinaora** (Skype, Yahoo, Facebook, Twitter, Gmail) hoặc tham gia trực tiếp xây dựng code tại trang https://github.com/vinaora/vinaora-vietalias/
