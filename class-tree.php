<?php
class UserTree {
    private $conn;

    public function __construct($dbConnection) {
        $this->conn = $dbConnection;
    }

    // دریافت افرادی که کاربر معرفی کرده است
    private function getInvitedPeople($userId) {
        $sql = "SELECT user.id, user.name 
                FROM user 
                INNER JOIN invited ON user.id = invited.invited_id 
                WHERE invited.user_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('i', $userId);
        $stmt->execute();
        $result = $stmt->get_result();

        $invitedPeople = [];
        while ($row = $result->fetch_assoc()) {
            $invitedPeople[] = $row;
        }

        $stmt->close();
        return $invitedPeople;
    }

    // نمایش درخت کاربران
    public function displayTree($userId, $level = 1) {
        // محدود کردن به 4 سطح برای کاربران عادی
        if ($level > 4) {
            return;
        }

        // دریافت اطلاعات کاربر
        $sql = "SELECT * FROM user WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('i', $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        $stmt->close();

        if (!$user) {
            echo "<div class='tree-item'>کاربر یافت نشد</div>";
            return;
        }

        // نمایش اطلاعات کاربر
        echo '<div class="tree-item">';
        echo '<span class="tree-node" onclick="toggleInvited(' . htmlspecialchars($user['id']) . ')">' . htmlspecialchars($user['name']) . '</span>';

        // دریافت افراد معرفی‌شده
        $invitedPeople = $this->getInvitedPeople($userId);

        if (count($invitedPeople) > 0) {
            echo '<div class="tree-branch" id="invited-' . htmlspecialchars($user['id']) . '" style="display: none;">';
            foreach ($invitedPeople as $invited) {
                $this->displayTree($invited['id'], $level + 1);
            }
            echo '</div>';
        } else {
            echo '<div class="tree-branch" id="invited-' . htmlspecialchars($user['id']) . '" style="display: none;">هیچ معرفی نشده است</div>';
        }

        echo '</div>';
    }
}


