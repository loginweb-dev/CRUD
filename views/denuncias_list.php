<?php
function denuncias_list() {
    ?>
    <link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/iby-master/css/style-admin.css" rel="stylesheet" />
    <div class="wrap">
        <h2>Listado de Denuncias</h2>
        <div class="tablenav top">
            <div class="alignleft actions">
                <a class="button"  href="<?php echo admin_url('admin.php?page=nueva-denuncia'); ?>">Agregar Nueva</a>
            </div>
            <br class="clear">
        </div>
        <?php
            $args = array(
                'post_type'        => 'pos_register',
                'post_status'        => array ('pending', 'publish', 'private'),
                'author' => '-1',
            );
            $rows = get_posts( $args );
        ?>
        <table class='wp-list-table widefat fixed striped posts'>
            <tr>
                <th class="manage-column ss-list-width">Estado</th>
                <th class="manage-column ss-list-width">Acciones</th>
                <th class="manage-column ss-list-width">Nombre</th>
                <th class="manage-column ss-list-width">Creado</th>
            </tr>
            <?php for($i=0; $i < count($rows); $i++){ $user = get_user_by( 'id', $rows[$i]->post_author ); ?>
                <tr>
                    <td class="manage-column ss-list-width"><?php echo $rows[$i]->post_status; ?></td>
                    <td>
                        <a href="<?php if($rows[$i]->post_status=='pending' || $rows[$i]->post_status=='publish'){ echo WP_PLUGIN_URL.'/iby-master/pos.php?box_id='.$rows[$i]->ID; }else{ echo '#'; } ?>"class="button"><?php if($rows[$i]->post_status=='pending' || $rows[$i]->post_status=='publish'){ echo 'Abrir'; }else { echo 'Imprimir'; } ?></a>
                        <a href="<?php echo admin_url('admin.php?page=boxs-edit&box_id='.$rows[$i]->ID); ?>" class="button">Ver</a>                      
                    </td>
                    <td class="manage-column ss-list-width"><?php echo $rows[$i]->post_title; ?></td>
                    <td class="manage-column ss-list-width"><?php echo $rows[$i]->post_date; ?></td>
                </tr>
            <?php } ?>
        </table>
    </div>
    <?php
}