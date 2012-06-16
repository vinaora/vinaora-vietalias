Vinaora Vietnamese Alias
========================

* Homepage: http://vinaora.com/vinaora-vietalias/
* Sourcecode: https://github.com/vinaora/vinaora-vietalias/
* Pull Requests: https://github.com/vinaora/vinaora-vietalias/pulls
* Issues: https://github.com/vinaora/vinaora-vietalias/issues

Thông tin chung
---------------
[Vietnamese Alias for Joomla](http://vinaora.com/vinaora-vietalias/) - Tạo trường bí danh (Alias) hay đường link của bài viết, hoặc của bất kỳ một đối tượng nào khác (menu, category, banner, weblink...) trong Joomla bằng chuỗi tiếng Việt không dấu, chữ thường và phân tách giữa các từ bằng dấu gạch ngang.

VD: Nếu tiêu đề bài viết là: `Giới thiệu chung về Trường Đại học Bách Khoa Hà Nội` thì bí danh (alias) của nó sẽ là: `gioi-thieu-chung-ve-truong-dai-hoc-bach-khoa-ha-noi`

Tính năng
---------
* Tương thích hoàn toàn với Joomla 2.5, Joomla 1.6/1.7
* Xử lý triệt để vấn đề lỗi, mất ký tự trong các đường link, trường bí danh (Alias) của Joomla
* Tạo các đường link thực sự thân thiện và SEO hiệu quả
* Cho phép nạp trên tất cả các trang khi soạn thảo (1) hoặc chỉ nạp trên một số trang chuyên biệt (2)
* Tự động hoàn thiện (3) trường bí danh (Alias) ngay khi gõ phần tiêu đề (Title/Name)
* Hỗ trợ cả tiếng Việt Unicode dựng sẵn và Unicode tổ hợp (4)
* Loại bỏ hoàn toàn các ký tự đặc biệt (5)
* Hỗ trợ cả phần tiền sảnh (front-end) và phần hậu sảnh (back-end) của Joomla
* Không phụ thuộc vào việc đã cài đặt gói ngôn ngữ Việt Nam hay chưa (6)
* Được đóng gói trong plugin, nên không gây ảnh hưởng khi nâng cấp Joomla
* Code được nghiên cứu cẩn thận và tối ưu về hiệu suất
* Tiết kiệm thời gian và công sức

Giải thuật chính khi chuyển đổi chuỗi tiếng Việt
------------------------------------------------
* Bước 1: Loại bỏ 5 dấu thanh (huyền, hỏi, ngã, sắc, nặng) nếu có ký tự tiếng Việt Unicode tổ hợp
* Bước 2: Thay thế các ký tự đặc biệt `@#$%^&*-_+=`... bằng các khoảng trắng
* Bước 3: Thay thế 11 nguyên âm của tiếng Việt gồm `[a|ă|â],[e|ê],i,[o|ơ],[u|ư],y` (có hoặc không kèm dấu thanh) bằng 5 nguyên âm tiếng Anh tương ứng `a,e,i,o,u,y` và phụ âm `đ/Đ` bằng ký tự `d`
* Bước 4: Chuẩn hóa chuỗi ký tự (đảm bảo các ký tự được phép chỉ gồm `a-z, 0-9` và dấu gạch ngang `-`; thay thế các khoảng trắng bằng 01 dấu gạch ngang...)
* Kết quả đầu ra: Chuỗi ký tự tiếng Việt không dấu, chữ thường, chỉ gồm các chữ cái tiếng Anh a-z, các chữ số từ 0-9 và phân tách giữa các từ bằng dấu gạch ngang.

Cảnh báo
--------
* Đối với các đường link, trường bí danh (alias) đã có trước khi cài đặt plugin **Vinaora VietAlias** bạn cần phải xóa trường bí danh và nhấn nút [Lưu] (Save) để plugin tự động tạo chuỗi ký tự mới.
* Tính năng tự động hoàn thiện bằng Ajax có thể gặp trục trặc nếu bạn đã vô hiệu hóa thư viện Mootools của Joomla. 

Chú giải
--------
* (1): Trang soạn thảo được xác định qua biến HTTP Request `$task=edit`
* (2): Các trang chuyên biệt được xác định qua biến HTTP Request `$option=com_xyz`
* (3): Sử dụng Ajax + thư viện Mootools của Joomla.
* (4): Nhiều plugin/tool bỏ quên không xử lý với các chuỗi Unicode tổ hợp.
* (5): Việc loại bỏ vẫn đảm bảo việc thay thế phù hợp khi các dấu phân tách câu (dấu phảy, dấu chấm...) bị đặt sai chính tả.
* (6): Giải thuật xử lý có thể đưa vào file `vi-VN.localise.php` của gói ngôn ngữ thay vì phải cài đặt plugin này. Tuy nhiên sẽ bị hạn chế trong trường hợp người dùng không cài gói ngôn ngữ này hoặc chọn ngôn ngữ mặc định khác vi-VN.

Ý kiến đóng góp
---------------
Mọi ý kiến đóng góp xin liên hệ với: `vinaora` (Gmail, Skype, Yahoo, Facebook, Twitter) hoặc tham gia trực tiếp xây dựng code tại trang https://github.com/vinaora/vinaora-vietalias/

