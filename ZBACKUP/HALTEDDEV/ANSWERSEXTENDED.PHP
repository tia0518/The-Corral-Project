<?PHP
REQUIRE('CONNECTDB.PHP');
?>

<?PHP
//ANSWER DETAILS
$ANSWER = "INSERT INTO ANSWER (ANSWER_ID, ANSWER)
VALUES
            --Q1: CAMPUS LOCATION
            ('1',  'GEELONG'),
            ('2',  'BURWOOD'),
            ('3',  'CLOUD - CANNOT ACCESS GEELONG OR BURWOOD CAMPUSES'),
            ('4',  'CLOUD - CAN TRAVEL TO GEELONG CAMPUS EASILY'),
            ('5',  'CLOUD - CAN TRAVEL TO BURWOOD CAMPUS EASILY'),
            ('6',  'CLOUD - LOCATED OUTSIDE OF AUSTRALIA'),
            --Q2: WORK STATUS
            ('7',  'FULL TIME'),
            ('8',  'PART TIME'),
            ('9',  'CURRENTLY NOT WORKING'),
            --Q3: NEXT TRIMESTER SELECTIONS
            ('10', 'CURRENTLY ENROLLED IN SIT302, WILL CONTINUE WITH SIT374'),
            ('11', 'NO, I WILL NOT BE ENROLLING IN SIT374 NEXT TRIMESTER'),
            --Q4: CURRENT COURSE
            ('12', 'BACHELOR OF COMPUTER SCIENCE - '),
            ('13', 'BACHELOR OF COMPUTER SCIENCE - '),
            ('14', 'BACHELOR OF COMPUTER SCIENCE - '),
            ('15', 'BACHELOR OF CYBERSECURITY'),
            ('16', 'BACHELOR OF GAME DESIGN AND DEVELOPMENT'),
            ('17', 'BACHELOR OF BACHELOR OF IT (CLOUD COMPUTING)'),
            ('18', 'BACHELOR OF BACHELOR OF IT (GAME DEVELOPMENT)'),
            ('19', 'BACHELOR OF BACHELOR OF IT (INTERACTIVE MEDIA DESIGN)'),
            ('20', 'BACHELOR OF BACHELOR OF IT (MOBILE AND APPS DEVELOPMENT)'),
            ('21', 'BACHELOR OF BACHELOR OF IT (PROGRAMMING)'),
            ('22', 'BACHELOR OF BACHELOR OF IT (SECURITY)'),
            ('23', 'BACHELOR OF BACHELOR OF IT (VIRTUAL AND AUGMENTED REALITY)'),
            --Q5: SKILL SET
            ('24', 'PROGRAMMER - NOVICE'),
            ('25', 'PROGRAMMER - INTERMEDIATE'),
            ('26', 'PROGRAMMER - ADVANCED'),
            ('27', 'UX/UI - NOVICE'),
            ('28', 'UX/UI - INTERMEDIATE'),
            ('29', 'UX/UI - ADVANCED'),
            ('30', 'SECURITY SPECIALIST - NOVICE'),
            ('31', 'SECURITY SPECIALIST - INTERMEDIATE'),
            ('32', 'SECURITY SPECIALIST - ADVANCED'),
            ('33', 'DATABASE DEVELOPER - NOVICE'),
            ('34', 'DATABASE DEVELOPER - INTERMEDIATE'),
            ('35', 'DATABASE DEVELOPER - ADVANCED'),
            ('36', 'WEB DEVELOPER - NOVICE'),
            ('37', 'WEB DEVELOPER - INTERMEDIATE'),
            ('38', 'WEB DEVELOPER - ADVANCED'),
            ('39', 'CLOUD SERVICE DEVELOPER - NOVICE'),
            ('40', 'CLOUD SERVICE DEVELOPER - INTERMEDIATE'),
            ('41', 'CLOUD SERVICE DEVELOPER - ADVANCED'),
            ('42', 'APP DEVELOPER (MOBILE) - NOVICE'),
            ('43', 'APP DEVELOPER (MOBILE) - INTERMEDIATE'),
            ('44', 'APP DEVELOPER (MOBILE) - ADVANCED'),
            ('45', 'NETWORK ENGINEER - NOVICE'),
            ('46', 'NETWORK ENGINEER - INTERMEDIATE'),
            ('47', 'NETWORK ENGINEER - ADVANCED'),
            ('48', 'VR/GAME DEVELOPER - NOVICE'),
            ('49', 'VR/GAME DEVELOPER - INTERMEDIATE'),
            ('50', 'VR/GAME DEVELOPER - ADVANCED'),
            ('51', '3D ARTIST/ANIMATOR - NOVICE'),
            ('52', '3D ARTIST/ANIMATOR - INTERMEDIATE'),
            ('53', '3D ARTIST/ANIMATOR - ADVANCED'),
            ('54', 'TECHNICAL ARTIST - NOVICE'),
            ('55', 'TECHNICAL ARTIST - INTERMEDIATE'),
            ('56', 'TECHNICAL ARTIST - ADVANCED'),
            ('57', 'PROJECT MANAGER - NOVICE'),
            ('58', 'PROJECT MANAGER - INTERMEDIATE'),
            ('59', 'PROJECT MANAGER - ADVANCED'),
            ('60', 'INTERACTIVE MEDIA CONTENT DEVELOPER - NOVICE'),
            ('61', 'INTERACTIVE MEDIA CONTENT DEVELOPER - INTERMEDIATE'),
            ('62', 'INTERACTIVE MEDIA CONTENT DEVELOPER - ADVANCED'),
            ('63', 'BUSINESS ANALYST - NOVICE'),
            ('64', 'BUSINESS ANALYST - INTERMEDIATE'),
            ('65', 'BUSINESS ANALYST - ADVANCED'),
            --Q6 TECHNICAL SKILLS
            ('66', 'BLANK'),
            ('67', 'BLANK'),
            ('68', 'BLANK'),
            ('69', 'BLANK'),
            ('70', 'BLANK'),
            ('71', 'BLANK'),
            ('72', 'BLANK'),
            ('73', 'BLANK'),
            ('74', 'BLANK'),
            ('75', 'BLANK'),
            ('76', 'BLANK'),
            ('77', 'BLANK'),
            ('78', 'BLANK'),
            ('79', 'BLANK'),
            ('80', 'BLANK'),
            ('81', 'BLANK'),
            ('82', 'BLANK'),
            ('83', 'BLANK'),
            ('84', 'BLANK'),
            ('85', 'BLANK'),
            ('86', 'BLANK'),
            ('87', 'BLANK'),
            ('88', 'BLANK'),
            ('89', 'BLANK'),
            ('90', 'BLANK'),

            //EXECUTE QUERY
            IF (MYSQLI_QUERY($CON,$ANSWER)) {
              ECHO "<P>ANSWER ENTRIES CREATED SUCCESSFULLY</P>";
            } ELSE {
              ECHO "ERROR CREATING ANSWER ENTRIES: " . MYSQLI_ERROR($CON);
            }

?>
