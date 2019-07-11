<div class="flowers-list">
    <h2>Все статьи</h2>

    <table>

        <?php foreach ($list as $val): ?>

            <tr>
                <td><?php echo htmlspecialchars($val['title'], ENT_QUOTES); ?></td>
                <td>
                    <a href="/admin/edit-post/<?php echo $val['id']; ?>">
                        <span><i class="fas fa-edit" style="font-size: 20px;"></i></span>
                    </a>
                </td>
                <td>
                    <span class="delete" id="<?php echo $val['id']; ?>" data-name="<?php echo $val['title']; ?>" onclick="deletePost(event);"><i class="fas fa-trash-alt" style="font-size: 19px;"></i></span>
                </td>
            </tr>

        <?php endforeach; ?>

    </table>

</div>

