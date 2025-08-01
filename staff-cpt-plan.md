# Staff Custom Post Type Implementation Plan
## Silver Psychotherapy WordPress Plugin

### Overview
This document outlines the complete implementation plan for a Staff Custom Post Type with ACF Pro integration and Flatsome-compatible shortcodes for the Silver Psychotherapy website.

---

## 1. Custom Post Type Structure

### Staff CPT Configuration
```php
'labels' => [
    'name' => 'Staff Members',
    'singular_name' => 'Staff Member'
],
'public' => true,
'has_archive' => true,
'rewrite' => ['slug' => 'meet-our-staff'],
'supports' => ['title', 'editor', 'thumbnail', 'excerpt', 'page-attributes']
```

**Benefits of Single CPT Approach:**
- 80% field overlap across all staff types
- Simplified management and consistency
- Single archive page with filtering
- Flexible role changes (staff can have multiple roles)
- Easier template maintenance

---

## 2. ACF Pro Field Groups

### Field Group 1: "Staff Basic Information"
**Location:** Post Type = Staff

| Field Name | Type | Required | Notes |
|------------|------|----------|-------|
| Staff Type | Radio Button | Yes | Counselors/Therapists, Prescribers, Admin, Virtual Providers |
| Full Name | Text | Yes | Complete legal name |
| Display Name | Text | No | How name appears on site (e.g., "Mandi" vs "Amanda") |
| Credentials | Text | No | LCPC, LCSW-C, BCD, etc. |
| Pronouns | Text | No | She/Her, He/Him, They/Them |
| Professional Title | Text | Yes | Job title/role description |
| Profile Photo | Image | No | Main headshot |
| Photo Alt Text | Text | No | Accessibility description |

### Field Group 2: "Professional Details"
**Location:** Post Type = Staff
**Conditional Logic:** Show for Therapists and Prescribers

| Field Name | Type | Conditional Logic | Notes |
|------------|------|-------------------|-------|
| Professional Bio | WYSIWYG Editor | All types | Main biographical content |
| Years of Experience | Number | Therapists/Prescribers | Highlight experience level |
| Philosophy/Quote | Textarea | All types | Personal/professional philosophy |
| Areas of Focus | Textarea | Therapists/Prescribers | What they help with |
| Client Types Served | Checkbox | Therapists/Prescribers | Children, Adolescents, Adults, Families, Couples |

### Field Group 3: "Specializations & Approaches"
**Location:** Post Type = Staff
**Conditional Logic:** Show for Therapists and Prescribers

| Field Name | Type | Sub-fields | Notes |
|------------|------|------------|-------|
| Specializations | Repeater | - Specialization Name (Text)<br>- Description (Textarea)<br>- Link to Service (URL) | Trauma, anxiety, ADHD, etc. |
| Treatment Approaches | Repeater | - Approach Name (Text)<br>- Description (Textarea) | CBT, DBT, Brainspotting, etc. |
| Medication Focus | Repeater | - Focus Area (Text)<br>- Description (Textarea) | Show for Prescribers only |

### Field Group 4: "Education & Training"
**Location:** Post Type = Staff
**Conditional Logic:** Show for Therapists and Prescribers

| Field Name | Type | Sub-fields | Notes |
|------------|------|------------|-------|
| Education Section Title | Text | N/A | Default: "My Education" |
| Education Content | WYSIWYG Editor | N/A | Full education narrative |
| Degrees | Repeater | - Degree Type (Text)<br>- Field of Study (Text)<br>- Institution (Text)<br>- Year (Number) | Structured degree info |
| Certifications | Repeater | - Certification Name (Text)<br>- Certifying Body (Text)<br>- Year Obtained (Number) | Professional certifications |
| Additional Training | Textarea | N/A | Other relevant training |

### Field Group 5: "Contact & Availability"
**Location:** Post Type = Staff

| Field Name | Type | Notes |
|------------|------|-------|
| Direct Phone | Text | If different from main office |
| Direct Email | Email | If different from main office |
| Office Location | Select | Frederick, Remote, Both |
| Accepting New Clients | True/False | Current availability status |
| Schedule Notes | Textarea | Availability information |

### Field Group 6: "Page Settings"
**Location:** Post Type = Staff

| Field Name | Type | Options | Notes |
|------------|------|---------|-------|
| Show on Main Staff Page | True/False | N/A | Display in staff directory |
| Featured Staff Member | True/False | N/A | Highlight on homepage |
| Page Template | Select | Default, Detailed, Minimal | Different layout options |
| SEO Meta Description | Textarea | N/A | Custom meta description |
| Custom Page Title | Text | N/A | Override default title |

---

## 3. Custom Taxonomies

### Staff Specializations
**Taxonomy:** `staff_specialization`
**Type:** Hierarchical
**Terms:**
- Anxiety Disorders
- Depression
- Trauma & PTSD
- ADHD
- Autism Spectrum
- Grief & Loss
- Couples Therapy
- Family Therapy
- Child/Adolescent Therapy
- Substance Abuse
- Eating Disorders

### Treatment Modalities
**Taxonomy:** `treatment_modality`
**Type:** Hierarchical
**Terms:**
- Cognitive Behavioral Therapy (CBT)
- Dialectical Behavior Therapy (DBT)
- Brainspotting
- Cognitive Processing Therapy (CPT)
- Play Therapy
- Art Therapy
- EMDR
- Solution-Focused Therapy

### Client Populations
**Taxonomy:** `client_population`
**Type:** Hierarchical
**Terms:**
- Children (5-12)
- Adolescents (13-17)
- Young Adults (18-25)
- Adults (26-64)
- Seniors (65+)
- Families
- Couples

---

## 4. Shortcode System

### Core Shortcodes

#### Basic Type Shortcodes
```php
[staff_therapists]          // All therapists
[staff_prescribers]         // All prescribers  
[staff_admin]              // All admin staff
[staff_virtual]            // All virtual providers
[staff_all]                // All staff members
```

#### Advanced Shortcodes with Parameters
```php
[staff_by_type type="therapist" layout="grid" columns="3" show_bio="true"]
[staff_by_specialization specialization="trauma,anxiety" layout="list"]
[staff_featured featured="true" limit="4" layout="slider"]
```

### Shortcode Parameters

| Parameter | Options | Default | Description |
|-----------|---------|---------|-------------|
| `type` | therapist, prescriber, admin, virtual, all | all | Filter by staff type |
| `layout` | grid, list, slider, cards | grid | Display layout |
| `columns` | 1, 2, 3, 4, 5, 6 | 3 | Number of columns (grid layout) |
| `limit` | number or -1 | -1 | Maximum number to show |
| `show_photo` | true, false | true | Display profile photos |
| `show_bio` | true, false | false | Display bio excerpt |
| `show_credentials` | true, false | true | Display credentials |
| `show_specializations` | true, false | false | Display specialization tags |
| `featured_only` | true, false | false | Show only featured staff |
| `specialization` | slug1,slug2 | - | Filter by specializations |
| `orderby` | menu_order, title, date | menu_order | Sort order |
| `order` | ASC, DESC | ASC | Sort direction |

### Implementation Structure

```php
// Main shortcode function
function silver_staff_shortcode($atts) {
    // Parse attributes with defaults
    // Build WP_Query arguments
    // Apply filters (type, featured, specialization)
    // Render output based on layout
    // Return formatted HTML
}

// Specific type shortcodes
function staff_therapists_shortcode($atts) {
    $atts['type'] = 'therapist';
    return silver_staff_shortcode($atts);
}

// Register shortcodes
add_shortcode('staff_therapists', 'staff_therapists_shortcode');
add_shortcode('staff_prescribers', 'staff_prescribers_shortcode');
// ... etc
```

---

## 5. Template Structure

### Single Staff Template
**File:** `single-staff.php`

```php
// Load different content based on staff type
$staff_type = get_field('staff_type');

switch($staff_type) {
    case 'therapist':
        get_template_part('template-parts/staff/therapist-content');
        break;
    case 'prescriber':
        get_template_part('template-parts/staff/prescriber-content');
        break;
    case 'admin':
        get_template_part('template-parts/staff/admin-content');
        break;
    case 'virtual':
        get_template_part('template-parts/staff/virtual-content');
        break;
}
```

### Archive Template
**File:** `archive-staff.php`

- Filterable staff directory
- Category tabs (Therapists, Prescribers, Admin)
- Search functionality
- Specialization filtering

### Template Parts
```
template-parts/staff/
├── therapist-content.php      // Therapist-specific layout
├── prescriber-content.php     // Prescriber-specific layout  
├── admin-content.php          // Admin staff layout
├── virtual-content.php        // Virtual provider layout
├── grid-item.php             // Grid layout item
├── list-item.php             // List layout item
└── slider-item.php           // Slider layout item
```

---

## 6. CSS Framework Integration

### Flatsome Grid System
```scss
.staff-container {
    &.columns-3 {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
        
        @media (max-width: 768px) {
            grid-template-columns: 1fr;
        }
    }
}

.staff-member {
    background: var(--body-bg);
    border-radius: 8px;
    padding: 1.5rem;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    transition: transform 0.3s ease;
    
    &:hover {
        transform: translateY(-5px);
    }
}
```

---

## 7. Usage Examples in Flatsome

### Homepage - Featured Staff
```
[staff_featured limit="4" layout="slider" show_bio="true"]
```

### About Page - All Staff by Category
```html
<h2>Our Counselors & Therapists</h2>
[staff_therapists columns="3" show_specializations="true"]

<h2>Our Prescribers</h2>
[staff_prescribers columns="2" show_bio="true"]

<h2>Our Administrative Team</h2>
[staff_admin layout="list"]
```

### Services Page - Specialty-Specific
```
[staff_by_specialization specialization="trauma,ptsd" show_bio="true" columns="2"]
```

### Custom Sections
```html
<div class="trauma-specialists">
    <h3>Trauma Specialists</h3>
    [staff_by_specialization specialization="trauma" layout="cards" columns="3"]
</div>
```

---

## 8. Auto-Update Benefits

### Content Management
- Add new staff → automatically appears in relevant shortcodes
- Change staff type → moves to appropriate sections automatically  
- Update specializations → appears in filtered displays
- Mark as featured → shows in featured sections

### No Page Updates Required
- All content changes reflect immediately
- No need to manually update multiple pages
- Consistent formatting across all displays
- Easy bulk changes via WordPress admin

---

## 9. Implementation Priority

### Phase 1: Foundation
1. Create Staff CPT
2. Set up basic ACF field groups
3. Create core taxonomies
4. Build single template

### Phase 2: Shortcodes
1. Implement basic shortcode system
2. Create layout templates
3. Add parameter handling
4. Test in Flatsome

### Phase 3: Advanced Features
1. Add conditional logic to ACF fields
2. Implement advanced filtering
3. Create admin interface enhancements
4. Add CSS styling

### Phase 4: Integration
1. Replace existing staff pages
2. Set up redirects
3. Update navigation menus
4. SEO optimization

---

## 10. Technical Notes

### Database Considerations
- Use menu_order for custom staff ordering
- Index meta fields for performance
- Consider caching for shortcode queries

### Security
- Sanitize all shortcode parameters
- Validate user inputs
- Use proper WordPress escaping functions

### Performance
- Implement query caching for repeated shortcode calls
- Optimize image loading (lazy loading)
- Use WordPress object cache where possible

### Accessibility
- Proper alt text for images
- Semantic HTML structure
- Keyboard navigation support
- Screen reader compatibility

---

This comprehensive plan provides a scalable, maintainable solution for managing staff content while integrating seamlessly with the existing Flatsome theme and providing maximum flexibility for content managers.
