
     <?php if (!empty($utilisateurs) && is_array($utilisateurs)): ?>
            <?php foreach ($utilisateurs as $utilisateur): ?>
                
                    <?= esc($utilisateur['id']) ?>
                    <?= esc($utilisateur['nom']) ?>
                    <?= esc($utilisateur['email']) ?>
                
            
        
   
