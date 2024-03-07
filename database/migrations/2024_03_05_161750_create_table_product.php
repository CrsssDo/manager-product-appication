<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('price');
            $table->integer('amount');
            $table->enum('product_status', ['available', 'out_of_stock'])->default('available');
            $table->string('image_url');
            $table->integer('location_id')->nullable();
            $table->string('description')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        \Illuminate\Support\Facades\DB::statement("
        INSERT INTO `products` VALUES (1,'Lót chuột cỡ lớn 90x40 80x30 pad chuột full 50 mẫu siêu hót chuyên game,đáy cao su mặt vải speed chống nước bảo hành 12T',13000,273,'available','vn-11134207-7r98o-lpduaf58fwwrbc.jpeg',1,NULL,NULL,'2024-03-07 12:56:42','2024-03-07 12:56:42'),(2,'Xiaozhubangchu keycaps Mario bàn phím cơ 124 phím keycaps chất lượng cao kết hợp',165000,7487,'available','sg-11134201-7rbk5-lmzewxxfis7u0b.jpeg',2,NULL,NULL,'2024-03-07 12:56:42','2024-03-07 12:56:42'),(3,'Lót chuột CỠ LỚN 100 mẫu kích thước 80x30cm pad chuột cao su lót chuột gaming cỡ lớn speed bo viền chắc chắn TechStar',7000,294,'available','sg-50009109-006be33340daa417b75587f0a8c98425.png',3,NULL,NULL,'2024-03-07 12:56:42','2024-03-07 12:56:42'),(4,'( Tặng Ốp) Tai Nghe Bluetooth Không Dây Pro 2 Định Vị Đổi Tên , Tự Động Kết Nối Cảm Ứng , Cảm Ứng Đa Điểm Sp09',134000,7457,'available','vn-11134207-7r98o-lsjbazyw1z89dc.jpeg',1,NULL,NULL,'2024-03-07 12:56:42','2024-03-07 12:56:42'),(5,'Tai Nghe Bluetooth Pro 2 Không Dây Cao Cấp Định Vị Đổi Tên Tự Động Kết Nối Cảm Ứng SP88 PKT',155000,7487,'available','vn-11134207-7r98o-lskmpxuvi85g55.jpeg',1,NULL,NULL,'2024-03-07 12:56:42','2024-03-07 12:56:42'),(6,'Bộ Dụng Cụ Vệ Sinh Laptop - Máy tính - Bàn Phím - Tai Nghe Airpod Đa Năng 7 in 1 Siêu Nhỏ Gọn',9000,7487,'available','925bc8cc7b70ebbbccc3a94803710ba1.jpeg',2,NULL,NULL,'2024-03-07 12:56:42','2024-03-07 12:56:42'),(7,'Lót chuột, pad chuột cỡ 26x21cm bo viền chắc chắn hơn 50 mẫu in sắc nét dày dặn',12000,7487,'available','sg-11134201-22120-2bvb9b9xjdlve6.jpeg',3,NULL,NULL,'2024-03-07 12:56:42','2024-03-07 12:56:42'),(8,'Giá Đỡ Laptop Notebook Bằng Nhựa Abs Có Thể Gấp Gọn Tiện Lợi',23000,7487,'available','vn-11134207-7r98o-lmrnyfjfmfhb03.jpeg',3,NULL,NULL,'2024-03-07 12:56:42','2024-03-07 12:56:42'),(9,'Lót Chuột Phím Tắt Văn Phòng Cao Cấp kích thước 80x30x0,2cm.21x26x0,2cm.Tiếng Việt Kết Hợp Bàn Di Chuột',50000,225,'available','vn-11134201-23030-je6135njq6nvc9.jpeg',2,NULL,NULL,'2024-03-07 12:56:42','2024-03-07 12:56:42'),(10,'Lót chuột cỡ lớn 80x30cm pad gaming cỡ lớn speed bo viền chắc chắn VUALOTCHUOT',38000,225,'available','vn-11134207-7r98o-lo22i0gc104t17.jpeg',3,NULL,NULL,'2024-03-07 12:56:42','2024-03-07 12:56:42'),(11,'Giá đỡ LAPTOP, MACBOOK, IPAD bằng nhôm có thể điều chỉnh được độ cao, đế tản nhiệt kê laptop nhôm',65000,4961,'available','c99d98425945615f7a0d65a356077be0.jpeg',3,NULL,NULL,'2024-03-07 12:56:42','2024-03-07 12:56:42'),(12,'Tấm Lót Chuột Cỡ Lớn Trải Bàn Làm Việc Cực Sang Trọng Pad Chuột Lớn Bằng Nỉ (60x120cm) (90x40cm) - Thảm Nỉ Deco',125000,527,'available','2c457b65d21405dfa4858e46e6707fa2.jpeg',1,NULL,NULL,'2024-03-07 12:56:42','2024-03-07 12:56:42'),(13,'Bộ Bàn Phím Chuột Bluetooth Không Dây Ziyou M87 LED Kết Nối Đa Năng Chơi Game Dùng Văn Phòng',379000,527,'available','vn-11134207-7r98o-lme6f0rfrfmn30.jpeg',3,NULL,NULL,'2024-03-07 12:56:42','2024-03-07 12:56:42'),(14,'Tai nghe gaming có dây S P U19 có mic nhét tai phone chống ồn chơi game',16500,527,'available','sg-11134201-22110-8y3hbgepvpjvdd.jpeg',2,NULL,NULL,'2024-03-07 12:56:42','2024-03-07 12:56:42'),(15,'Lót Chuột Lót Chuột Cỡ Lớn Chống Trượt Chống Thấm Nước PAPAA.HOME',5000,771,'available','sg-11134201-22120-dluzxtdemzkv0b.jpeg',3,NULL,NULL,'2024-03-07 12:56:42','2024-03-07 12:56:42'),(16,'Giá đỡ LAPTOP, ĐIỆN THOẠI, MÁY TÍNH bằng nhôm có thể điều chỉnh được độ cao, đế kê laptop nhôm',26900,225,'available','vn-11134601-7r98o-lmyj1ou8nw0v73.png',3,NULL,NULL,'2024-03-07 12:56:42','2024-03-07 12:56:42'),(17,'Mouse Pad, Miếng Lót Chuột Cỡ Lớn, Bàn Di Chuột Sáng Tạo, Độc Đáo Desk Mat 900x400 800x300 độ dày 4 mm',120000,771,'available','sg-11134201-22090-g22wa3cdn3hvf7.jpeg',3,NULL,NULL,'2024-03-07 12:56:42','2024-03-07 12:56:42'),(18,'Tai nghe Bluetooth Nhét Tai Không Dây TWS Air Pro 4 Chống Tiếng Ồn Có Micro Cho IOS Xiaomi Android Bảo Hành Lỗi Đổi Mới',99000,765,'available','vn-11134207-7r98o-lsamigu37kxw66.jpeg',2,NULL,NULL,'2024-03-07 12:56:42','2024-03-07 12:56:42'),(19,'Lenovo G70 Tai nghe Chụp Tai Bluetooth Không Dây âm thanh nổi giảm ồn thoải mái chống thấm nước có mic thích hợp cho Android, IOS',319000,920,'available','cn-11134207-7r98o-lpq8jztnmibfe0.jpeg',3,NULL,NULL,'2024-03-07 12:56:42','2024-03-07 12:56:42'),(20,'Tai nghe có dây siêu bass Poermax E3 âm thanh nổi tích hợp micro và nút điều khiển âm lượng, giắc cắm chuẩn 3.5mm',85000,671,'available','vn-11134207-7qukw-lkj1v9ye1k0s22.jpeg',3,NULL,NULL,'2024-03-07 12:56:42','2024-03-07 12:56:42')
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
