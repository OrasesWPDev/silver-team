# Comprehensive Silver Team Staff Custom Post Type Implementation Plan

## Detailed Multi-Page Analysis Results

**Staff Categories & Role Types Identified:**
- **Counselors/Therapists**: LCPC, LCSW-C, Clinical Social Workers
- **Prescribers/Nurse Practitioners**: CRNP-PMH, MSN, PMHNP-BC, FNP-C
- **Virtual Providers**: Same credentials, different service delivery
- **Admin Staff**: Office Manager, Administrative Support

**Credential Variations Found:**
- LCPC (Licensed Clinical Professional Counselor) 
- LCSW-C (Licensed Clinical Social Worker - Clinical)
- CACGS (additional certifications)  
- CRNP-PMH (Certified Registered Nurse Practitioner - Psychiatric Mental Health)
- MSN (Master of Science in Nursing)
- PMHNP-BC (Psychiatric Mental Health Nurse Practitioner - Board Certified)
- FNP-C (Family Nurse Practitioner - Certified)
- PMH-C (additional psychiatric certifications)

**Contact/Social Media Patterns:**
- **Phone Numbers**: Multiple formats - tel:2404158893, tel:(240)415-8893, tel:240-415-8893
- **Email Types**: 
  - General: info@silverpsychotherapy.com
  - Prescribers: meds@silverpsychotherapy.com  
  - Individual: molly@, katie@silverpsychotherapy.com
- **YouTube**: Individual introduction videos + channel
- **LinkedIn**: Personal professional profiles + company page
- **Facebook**: Company page primarily

**Content Elements Discovered:**
- **Placeholder Images**: woman-placeholder.jpg for staff without photos
- **Variable Image Aspect Ratios**: Most 100%, some 90% (Sarah Gumpert)
- **Specialized Email Addresses**: Different emails for different roles
- **Individual Introduction Videos**: YouTube links per staff member
- **Professional Specializations**: Child/adolescent focus, veteran populations, first responders

## Complete ACF Pro Field Groups Architecture

### Field Group 1: "Staff Basic Information"
**Location Rules:** Post Type = Staff

**Core Identity Fields:**
- **Full Name** (Text) - Required
- **Professional Credentials** (Text) - e.g., "LCPC, CACGS", "CRNP-PMH"
- **Job Title/Position** (Text) - e.g., "Director of Remote Operations", "Office Manager"
- **Professional Headshot** (Image)
  - Return format: Image Array
  - Preview size: Medium  
  - Min width: 400px, Min height: 400px
  - Instructions: "Upload square image, 400x400px minimum"
- **Use Placeholder Image** (True/False) - For staff without photos
- **Bio/Description** (WYSIWYG Editor) - Full bio for individual pages
- **Short Description** (Textarea, 2-3 lines) - For meta descriptions

### Field Group 2: "Staff Contact & Digital Presence"
**Location Rules:** Post Type = Staff

**Contact Information:**
- **Primary Email** (Email) - Personal staff email
- **Department Email** (Select):
  - info@silverpsychotherapy.com (General)
  - meds@silverpsychotherapy.com (Prescribers)
  - Custom (with text field)
- **Phone Number** (Text) - Format: (240) 415-8893
- **Phone Extension** (Text) - If applicable

**Social Media & Professional Links (Repeater Field):**
- **Platform Type** (Select):
  - LinkedIn (Personal Profile)
  - LinkedIn (Company Page)
  - YouTube (Individual Video)
  - YouTube (Channel)
  - Facebook (Personal)
  - Facebook (Company)
  - Professional Website
  - Psychology Today
  - Other
- **URL** (URL field)
- **Display Label** (Text) - Custom tooltip text
- **Icon Priority** (Number) - Display order

### Field Group 3: "Staff Professional Credentials"
**Location Rules:** Post Type = Staff

**Licenses & Certifications (Repeater Field):**
- **License/Certification Type** (Select + Other):
  - LCPC (Licensed Clinical Professional Counselor)
  - LCSW-C (Licensed Clinical Social Worker - Clinical)
  - CRNP-PMH (Psychiatric Mental Health Nurse Practitioner)
  - PMHNP-BC (Psychiatric Mental Health NP - Board Certified)
  - FNP-C (Family Nurse Practitioner - Certified)
  - MSN (Master of Science in Nursing)
  - CACGS (Certified Advanced Clinical Grief Specialist)
  - PMH-C (Psychiatric Mental Health Certification)
  - Other (with text field)
- **License Number** (Text)
- **Issuing State** (Select)
- **Expiration Date** (Date Picker)
- **Display in Name** (True/False) - Show after name on cards

**Education Background (Repeater Field):**
- **Degree Type** (Select): MSW, MSN, PhD, MD, MA, BS, etc.
- **Field of Study** (Text)
- **Institution** (Text)  
- **Graduation Year** (Number)
- **Additional Details** (Textarea)

### Field Group 4: "Staff Specializations & Services"
**Location Rules:** Post Type = Staff

**Clinical Specializations (Checkbox):**
- Child Therapy (0-12)
- Adolescent Therapy (13-17)
- Adult Therapy (18+)
- Senior Therapy (65+)
- Couples Therapy
- Family Therapy
- Group Therapy
- Play Therapy
- Grief Counseling
- Trauma Therapy
- PTSD Treatment
- Anxiety/Depression
- ADHD Treatment
- Addiction Counseling
- Veteran/First Responder Therapy
- Life Transitions
- Other (with text field)

**Special Populations (Checkbox):**
- Veterans
- First Responders
- LGBTQ+ Community
- Multicultural Clients
- Spanish-Speaking Clients
- Other (with text field)

**Treatment Modalities (Checkbox):**
- Cognitive Behavioral Therapy (CBT)
- Dialectical Behavior Therapy (DBT)
- EMDR
- Play Therapy
- Art Therapy
- Family Systems
- Solution-Focused Therapy
- Medication Management
- Other (with text field)

### Field Group 5: "Staff Availability & Practice Details"
**Location Rules:** Post Type = Staff

**Service Delivery:**
- **In-Person Sessions** (True/False)
- **Telehealth Available** (True/False)
- **Office Location** (Text) - If different from main
- **Accepting New Clients** (True/False)
- **Waitlist Available** (True/False)
- **Availability Notes** (Textarea)

**Schedule & Capacity:**
- **Days Available** (Checkbox): Mon, Tue, Wed, Thu, Fri, Sat, Sun
- **Time Preferences** (Select): Morning, Afternoon, Evening, Flexible
- **Session Types** (Checkbox): Individual, Couples, Family, Group

**Insurance & Payment:**
- **Insurance Accepted** (Textarea)
- **Private Pay Available** (True/False)
- **Sliding Scale** (True/False)
- **Payment Notes** (Textarea)

### Field Group 6: "Staff Media & Advanced Content"
**Location Rules:** Post Type = Staff

**Video Content:**
- **Introduction Video URL** (URL) - YouTube embed
- **Video Title** (Text) - For accessibility
- **Additional Videos** (Repeater):
  - Video URL (URL)
  - Video Title (Text)
  - Video Description (Textarea)

**Photo Gallery:**
- **Additional Photos** (Gallery) - Office photos, action shots
- **Photo Captions** (Text per image)

**Documents & Resources:**
- **Professional Resume/CV** (File) - PDF upload
- **Treatment Philosophies** (WYSIWYG) - Detailed approach
- **Client Resources** (Repeater):
  - Resource Title (Text)
  - Resource File (File)
  - Description (Textarea)

**Professional Development:**
- **Continuing Education** (Repeater):
  - Course/Training Title (Text)
  - Provider (Text)
  - Date Completed (Date)
  - Hours/Credits (Number)

### Field Group 7: "Staff Display & SEO Settings"
**Location Rules:** Post Type = Staff

**Archive Display:**
- **Featured Staff** (True/False) - Prominent display
- **Display Order** (Number) - Custom sorting
- **Show on Archive** (True/False)
- **Card Background Color** (Color Picker) - Default: rgb(205, 215, 206)
- **Custom Button Text** (Text) - Default: "Learn More About [Name]"
- **Image Aspect Ratio** (Select): Square (100%), Portrait (90%), Custom

**SEO & Schema:**
- **Meta Description Override** (Textarea) - Custom description
- **Focus Keywords** (Text) - SEO keywords
- **Schema Markup Type** (Select):
  - Person
  - HealthcareProvider
  - MedicalDoctor  
  - Psychologist
  - Nurse
- **Hide from Search Engines** (True/False)

## Custom Post Type & Taxonomy Configuration

**Post Type: `staff`**
- **Rewrite:** `/meet-our-staff/%postname%/` (preserve existing URLs)
- **Archive:** `/meet-our-staff/` (main staff page)
- **Hierarchical:** false
- **Supports:** title, editor, thumbnail, excerpt, custom-fields, page-attributes
- **Show in REST:** true (Gutenberg support)
- **Menu Position:** 20 (below Pages)

**Taxonomy: `staff_category`**
- **Terms:** counselors-therapists, virtual-providers, prescribers, admin
- **Hierarchical:** true
- **Show in REST:** true
- **Custom Rewrite:** `/meet-our-staff/category/%staff_category%/`

**Taxonomy: `staff_specialization`** 
- **Non-hierarchical tags** for filtering
- **Terms:** child-therapy, couples-therapy, trauma, grief, etc.

## Template System & Display Options

### Advanced Shortcode System
```
[staff_section category="counselors-therapists" style="cards"]
[staff_grid category="prescribers" columns="3" show_videos="true"]
[staff_carousel category="virtual-providers" autoplay="true"]
[staff_list category="admin" style="minimal" show_phone="true"]
[staff_search categories="counselors-therapists,prescribers"]
[staff_featured limit="4" show_specializations="true"]
```

**Shortcode Parameters:**
- `category` - Filter by staff category
- `specialization` - Filter by treatment specialty  
- `accepting_clients` - Only show available staff
- `has_video` - Only show staff with intro videos
- `style` - cards, list, carousel, grid, minimal
- `columns` - 2, 3, 4 (for grid layouts)
- `show_phone`, `show_email`, `show_videos` - Display toggles
- `orderby` - display_order, name, credentials, date
- `limit` - Number of staff to display

## Migration & Integration Strategy

### Data Migration Challenges:
1. **Variable Phone Formats** - Standardize to (240) 415-8893
2. **Multiple Email Types** - Map to appropriate department emails  
3. **YouTube Video Integration** - Preserve individual introduction videos
4. **Placeholder Image Handling** - Maintain for staff without photos
5. **Credential Variations** - Parse and categorize properly
6. **Social Media Diversity** - Handle LinkedIn, YouTube, Facebook variations

### Preservation Requirements:
1. **Existing URL Structure** - Keep /meet-our-staff/[name]/ format
2. **Meta Descriptions** - Preserve SEO descriptions
3. **Image Alt Tags** - Maintain accessibility  
4. **Social Media Links** - Transfer all existing links
5. **Individual Videos** - Preserve YouTube introductions
6. **Contact Information** - Maintain all phone/email variations

## Implementation Phases

### Phase 1: Foundation Setup
1. **ACF Pro Dependency Check** - Admin notice if not installed/active
2. **Database Backup** - Before any migrations
3. **Custom Post Type Registration** - Staff CPT with proper rewrites
4. **Taxonomy Registration** - Staff categories and specializations
5. **Field Group Creation** - All 7 field groups via PHP/JSON

### Phase 2: Template Development
1. **Archive Template** (`archive-staff.php`) - Category filtered display
2. **Single Template** (`single-staff.php`) - Individual staff pages
3. **Shortcode System** - All shortcode variations
4. **Flatsome Integration** - Match existing theme styling
5. **Responsive Design** - Mobile-first approach

### Phase 3: Content Migration
1. **Migration Tool Development** - Convert existing pages to CPT
2. **Data Parsing Scripts** - Extract and categorize existing content
3. **Media Migration** - Move and optimize images
4. **URL Redirects** - 301 redirects for SEO preservation
5. **Content Validation** - Ensure all data transferred correctly

### Phase 4: Enhanced Features
1. **Search Functionality** - Staff directory search
2. **Filtering System** - By category, specialization, availability
3. **Performance Optimization** - Caching, lazy loading
4. **SEO Enhancements** - Schema markup, structured data
5. **Admin Interface** - User-friendly content management

## Benefits Summary

- **Rich Media Support:** Videos, galleries, documents per staff member
- **Comprehensive Contact Options:** Multiple social platforms, specialized emails
- **Professional Presentation:** Detailed credentials, specializations, education
- **Flexible Display:** Multiple layout options via shortcodes
- **SEO Optimized:** Structured data, custom meta descriptions
- **Future-Proof:** Scalable field system for new requirements
- **User-Friendly:** Intuitive admin interface for content updates
- **Mobile Responsive:** Optimized for all device types
- **Performance Focused:** Efficient queries and caching strategies

This comprehensive system accounts for all the variations found across the different staff pages and provides a robust, scalable solution for managing the diverse types of staff and their unique content requirements.