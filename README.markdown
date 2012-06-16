Vinaora Vietnamese Alias
========================

* Homepage: http://vinaora.com/vinaora-vietalias/
* Sourcecode: https://github.com/vinaora/vinaora-vietalias/
* Pull Requests: https://github.com/vinaora/vinaora-vietalias/pulls
* Issues: https://github.com/vinaora/vinaora-vietalias/issues

Thông tin chung
---------------
[Vietnamese Alias for Joomla](http://vinaora.com/vinaora-vietalias/) - Tạo trường bí danh của bài viết, hay bất kỳ một đối tượng khác trong Joomla bằng tiếng Việt không dấu

VD: Nếu tiêu đề bài viết là: 'Giới thiệu chung về Trường Đại học Bách Khoa Hà Nội' thì bí danh (alias) của nó sẽ là: 'gioi-thieu-chung-ve-truong-dai-hoc-bach-khoa-ha-noi'

Tính năng
---------
* Tương thích hoàn toàn với Joomla 2.5, Joomla 1.6/1.7
* Xử lý triệt để vấn đề lỗi, mất ký tự trong các đường link, trường Alias của Joomla
* Tạo các đường link thực sự thân thiện và SEO hiệu quả
* Cho phép nạp trên tất cả các trang hoặc chỉ nạp trên một số trang chuyên biệt
* Tự động hoàn thiện trường Alias (bí danh) ngay khi gõ phần tiêu đề
* Hỗ trợ cả tiếng Việt Unicode dựng sẵn và Unicode tổ hợp
* Loại bỏ hoàn toàn các ký tự đặc biệt
* Hỗ trợ cả phần tiền sảnh (front-end) và phần hậu sảnh (back-end) của Joomla
* Không phụ thuộc vào việc đã cài đặt gói ngôn ngữ Việt Nam hay chưa
* Được đóng gói trong plugin, nên không gây ảnh hưởng khi nâng cấp Joomla
* Code được nghiên cứu cẩn thận và tối ưu về hiệu suất

Giải thuật chính khi chuyển đổi chuỗi tiếng Việt
------------------------------------------------
* Bước 1: Loại bỏ 5 dấu thanh (huyền, hỏi, ngã, sắc, nặng) nếu có ký tự tiếng Việt Unicode tổ hợp
* Bước 2: Thay thế các ký tự đặc biệt (@#$%^&*...) bằng các khoảng trắng
* Bước 3: Thay thế 11 nguyên âm của tiếng Việt gồm [a|ă|â],[e|ê],i,[o|ơ],[u|ư],y (có hoặc không kèm dấu thanh) bằng 5 nguyên âm tiếng Anh tương ứng (a,e,i,o,u,y) và phụ âm đ/Đ bằng ký tự d
* Bước 4: Chuẩn hóa chuỗi ký tự (đảm bảo các ký tự được phép chỉ gồm a-z, 0-9 và dấu gạch ngang (-); thay thế các khoảng trắng bằng 1 dấu gạch ngang...)
